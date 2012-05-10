#!/usr/bin/env python
# -*- coding: utf-8 -*-

import MySQLdb as mdb
import sys
import json
import urllib2
from datetime import datetime
import ConfigParser

# gets the date object for the time string that we receive from twitter
def getDate(rawVal):
    modVal = datetime.strptime(rawVal[:rawVal.rfind(" ")], '%a, %d %b %Y %H:%M:%S')

    return modVal

def getGeoString(obj):
    if obj['geo'] != None:
        return "x:" + str(obj['geo']['coordinates'][0]) + " y:" + str(obj['geo']['coordinates'][1])
    else:
        return ""


config = ConfigParser.ConfigParser()
config.readfp(open('py.cfg'))

un = config.get("Database", "username")
pw = config.get("Database", "password")

#open connection to DB
conn = mdb.connect('localhost', un, pw,'jedarchi_seeds')

#conn = mdb.connect('localhost','root','Wingzer0','twitterDB') #this is my dev db
#get the cursor, this object will be used to execute all sql queries
cursor = conn.cursor()

#these are needed to make sure that we'll be encoding everything in utf-8 to allow for kanji
conn.set_character_set('utf8')
cursor.execute('SET NAMES utf8;')
cursor.execute('SET CHARACTER SET utf8;')
cursor.execute('SET character_set_connection=utf8;')

#these are the terms we will be searching. must be ascii safe (aka no raw kanji) and each will be prefixed by a # 
searchTerms = ['%E5%9C%B0%E9%9C%87','genpatsu','%E6%9D%B1%E9%9B%BB','%E7%A6%8F%E5%B3%B6','%E6%9D%B1%E5%8C%97','miyagi','%E5%8E%9F%E7%99%BA','%E8%A2%AB%E7%81%BD%E5%9C%B0','fukushima','iwate']

data = ""

#various queries that we will be using to check on data in the database and insert new stuff
countQ = "SELECT COUNT(*) FROM tweets WHERE twitterId='"
#these were used in the original version
#insertQgeo = "INSERT INTO tweets (userId, createdAt, twitterId, geoInfo, Text) VALUES('"
#insertQnoGeo = "INSERT INTO tweets (userId, createdAt, twitterId, Text) VALUES('"

#start looping through the terms
for term in searchTerms:
    #print "http://search.twitter.com/search.json?q=%23%"+term
    #just using the simple twitter json api here. there are other options, but I think we can get all the information we want from the simple api
    data = urllib2.urlopen("http://search.twitter.com/search.json?q=%23"+term)
    jsonDic = json.load(data)
    #checks to see if there has been a problem with the query. This can happen for a number of reasons, but most likely it would be due to volume limits (set by twitter)
    if "error" not in jsonDic or jsonDic["error"] == "":
        for result in jsonDic['results']:
            cursor.execute(countQ+result['id_str']+"'")
            res = cursor.fetchone()
            #check to see if the tweet already exists in the database, this is done by checking if the unique id from twitter is already in the db
            if int(res[0]) == 0:
                #print getDate(result['created_at'])
                #switch the insert statement depending on whether we have geo data or not
                cursor.execute("""
                INSERT INTO tweets (userId, createdAt, twitterId, geoInfo, Text) VALUES(%s,%s,%s,%s,%s)
                """, (result['from_user_id_str'],str(getDate(result['created_at'])),result['id_str'],getGeoString(result),result['text']))
                """ this is the old way, moved to using the db api to clean strings, ect.
                if result['geo'] != None:
                    cursor.execute(insertQgeo+result['from_user_id_str']+"', '"+ str(getDate(result['created_at']))+"', '"+result['id_str']+"', '"+str(result['geo']).replace("'","''")+"', '"+result['text'].replace("'","''")+"')")
                else:
                    cursor.execute(insertQnoGeo+result['from_user_id_str']+"', '"+ str(getDate(result['created_at']))+"', '"+result['id_str']+"', '"+result['text'].replace("'","''")+"')")
                """
        #commit changes to db
        conn.commit()

#free the db connection resources
cursor.close()
conn.close()

