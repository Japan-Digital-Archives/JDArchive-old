# -*- coding: utf-8 -*-

import MySQLdb as mdb
import sys
import json
import urllib2
from datetime import datetime
import ConfigParser

config = ConfigParser.ConfigParser()
config.readfp(open('py.cfg'))

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

selectQ = "select * from seeds where frequency = 'weekly' OR frequency = 'daily';"

cursor.execute(selectQ)

for record in cursor.fetchall():
    print str(record[0]) + "|" + str(record[1]) + "|"  +str(record[4]) + "<br/>"

#free the db connection resources
cursor.close()
conn.close()
