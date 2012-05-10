#!/usr/bin/python
# -*- coding: utf-8 -*-

import MySQLdb as mdb
import sys
import json
import urllib2
from datetime import datetime
import ConfigParser

config = ConfigParser.ConfigParser()
config.readfp(open('/home/ubuntu/sites/jedarchive/python/py.cfg'))

un = config.get("Database", "username")
pw = config.get("Database", "password")

#open connection to DB
conn = mdb.connect('localhost', un, pw,'jedarchi_seeds')

#conn = mdb.connect('localhost','root','Wingzer0','jedarchi_seeds') #this is my dev db
#get the cursor, this object will be used to execute all sql queries
cursor = conn.cursor()

#these are needed to make sure that we'll be encoding everything in utf-8 to allow for kanji
conn.set_character_set('utf8')
cursor.execute('SET NAMES utf8;')
cursor.execute('SET CHARACTER SET utf8;')
cursor.execute('SET character_set_connection=utf8;')


#we have to rate limit this because twitter will only let us make a little over 100 requests per hour.
tweetQ = "SELECT * FROM tweets WHERE geoInfo IS NULL OR geoInfo='' LIMIT 0,120;"

cursor.execute(tweetQ)

for record in cursor.fetchall():
    try:
        data = urllib2.urlopen("https://api.twitter.com/1/users/show.json?user_id="+record[1])
        jsonDic = json.load(data)
        if (jsonDic['location'] != "" and jsonDic['location'] != None):
            cursor.execute("""
            UPDATE tweets SET geoInfo=%s WHERE tweetId=%s
            """, (jsonDic['location'], record[0]))
        else:
            #print "yay"
            cursor.execute("""
            UPDATE tweets SET geoInfo=%s WHERE tweetId=%s
            """, ("Not Found", record[0]))
    except:
        print "https://api.twitter.com/1/users/show.json?user_id="+record[1]

#commit changes to db
conn.commit()
#free the db connection resources
cursor.close()
conn.close()
