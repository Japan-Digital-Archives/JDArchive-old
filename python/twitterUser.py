#!/usr/bin/python
# -*- coding: utf-8 -*-

import MySQLdb as mdb
import sys
import json
import urllib2
from datetime import datetime
import ConfigParser

# gets the date object for the time string that we receive from twitter #Tue Jan 10 16:03:38 +0000 2012
def getDate(rawVal):
    modVal = datetime.strptime(rawVal[:rawVal.rfind(" ")-5]+rawVal[rawVal.rfind(" "):], '%a %b %d %H:%M:%S %Y')

    return modVal

def getGeoString(obj):
    if obj['geo'] != None:
        return "x:" + str(obj['geo']['coordinates'][0]) + " y:" + str(obj['geo']['coordinates'][1])
    else:
        return ""

def getContributor(obj):
    if obj['contributors'] != None:
        return obj['contributors'][0]
    else:
        return "-1"

config = ConfigParser.ConfigParser()
config.readfp(open('/home/ubuntu/sites/jedarchive/python/py.cfg'))

un = config.get("Database", "username")
pw = config.get("Database", "password")

#open connection to DB
conn = mdb.connect('localhost', un, pw,'jedarchi_seeds')

#get the cursor, this object will be used to execute all sql queries
cursor = conn.cursor()

#these are needed to make sure that we'll be encoding everything in utf-8 to allow for kanji
conn.set_character_set('utf8')
cursor.execute('SET NAMES utf8;')
cursor.execute('SET CHARACTER SET utf8;')
cursor.execute('SET character_set_connection=utf8;')

userName = sys.argv[1]
countQ = "SELECT COUNT(*) FROM tweets WHERE twitterId='"

data = urllib2.urlopen("https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name="+userName)
jsonDic = json.load(data)

for tweet in jsonDic:
    if "error" not in jsonDic or jsonDic["error"] == "":
        cursor.execute(countQ+str(tweet['id'])+"'")
        res = cursor.fetchone()
        #check to see if the tweet already exists in the database, this is done by checking if the unique id from twitter is already in the db
        if int(res[0]) == 0:
            #print tweet
            cursor.execute("""
            INSERT INTO tweets (userId, createdAt, twitterId, geoInfo, Text) VALUES(%s,%s,%s,%s,%s)
            """, (getContributor(tweet),str(getDate(tweet['created_at'])),str(tweet['id']),getGeoString(tweet),tweet['text']))
            print "success!" + str(tweet['id'])

#commit changes to db
conn.commit()
#free the db connection resources
cursor.close()
conn.close()
