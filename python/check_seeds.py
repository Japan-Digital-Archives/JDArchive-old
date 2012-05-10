#!/usr/bin/python
# -*- coding: utf-8 -*-
#python script that will check and see if a link has been added to IA and if it has, it will update the database field. This script should be run once a day

import MySQLdb as mdb
import mechanize
import ConfigParser

config = ConfigParser.ConfigParser()
config.readfp(open('py.cfg'))

un = config.get("Database", "username")
pw = config.get("Database", "password")

#open connection to DB
conn = mdb.connect('localhost', un, pw,'jedarchi_seeds')

#get the cursor, this object will be used to execute all sql queries
cursor = conn.cursor()

#select all of the seeds that have not been added to IA yet
cursor.execute("""SELECT * FROM seeds WHERE isArchived='0' AND verified='1'""")

#create browser object for crawling IA
browser = mechanize.Browser()
browser.set_handle_robots(False)


for record in cursor.fetchall():
    try:
        response = browser.open("http://wayback.archive-it.org/2438/*/"+ record[1]) # 1 is the index at which the url is located, record is a tuple object that has each of the column values in the order they are listed on a describe TABLE query.
        bodyStr = response.read()
        
        if(bodyStr.find("<h2>Not in Archive</h2>") == -1):
            #text not found, this means a record exists
            cursor.execute("""UPDATE seeds SET isArchived=%s WHERE sid=%s""", (1,record[0]))
            print "does exist: http://wayback.archive-it.org/2438/*/"+ record[1]
        else:    
            #page not found, update DB accordingly
            cursor.execute("""UPDATE seeds SET isArchived=%s WHERE sid=%s""", (0,record[0]))
    except:
        print "doesn't exist: http://wayback.archive-it.org/2438/*/"+ record[1]
        error = "If the code reaches here, it is most likely due to a 404, which the archives will return when the page has not been archived."
    
#commit changes to DB
conn.commit()

#free the db connection resources
cursor.close()
conn.close()
