#!/usr/bin/python
# -*- coding: utf-8 -*-

import MySQLdb as mdb
import mechanize
import socket
import ConfigParser

#set the timeout value for page requests to 30 seconds
socket.setdefaulttimeout(30000) #in milli

config = ConfigParser.ConfigParser()
config.readfp(open('/home/ubuntu/sites/jedarchive/python/py.cfg'))

un = config.get("Database", "username")
pw = config.get("Database", "password")

#open connection to DB
conn = mdb.connect('localhost', un, pw,'jedarchi_seeds')


#get the cursor, this object will be used to execute all sql queries
cursor = conn.cursor()

#get the last seed seed id that was exported to IA
cursor.execute("""SELECT value FROM global""")
lastExport = cursor.fetchone()

#selects all seeds that have been exported already, are verified, and are marked as not in the archive by the other script
cursor.execute("""SELECT * FROM seeds WHERE sid < %s AND isArchived='0' AND verified='1'""", (lastExport[0],))

#create the file that will contain the results of this query
f = open('missing_seeds.txt','w')
writeStr = ""

#browser initalization code, tells it to ignore the robots
br = mechanize.Browser()
br.set_handle_robots(False)

#for each of the unarchived seeds we want to add a line in the output file that contains the site title and url split by a ||
#this will also download the robots.txt for these sites and put it in the robots/ directory
for row in cursor.fetchall():
    writeStr+= str(row[0])+"||"+str(row[1])+"||"+str(row[4])+"||"+str(row[5])+"\n"
    print "Now Attempting: " + row[1]
    try:
        br.open(row[1][:row[1].find("/", row[1].find("."))+1] + "robots.txt")
        fileName = row[1][:row[1].find("/", row[1].find("."))+1] + "robots.txt"
        fileName = fileName.replace("/","-")
        #creating the local copy of robots.txt
        f2 = open('robots/'+fileName,'w')
        f2.write(br.response().read())
        f2.close()
    except:
        text = "robots doesn't exist"

f.write(writeStr)

f.close()

#free the db connection resources
cursor.close()
conn.close()
