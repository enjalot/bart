####################################################
# Hacked-up Bay Area Public Salaries data scrapper #
# by Benjamin Sanchez Lengeling					   #
####################################################
# Libraries to download the website
from contextlib import closing
from selenium.webdriver import Firefox # pip install selenium
from selenium.webdriver.support.ui import WebDriverWait
# Libraries to parse downloaded website
import urllib2
from bs4 import BeautifulSoup
# Libraries to manage html
import csv
import math
# ====== Starting variables =========
dataRange=(50001,100000)
dataPerPage=1000 #max
tableIdx=24 #determined empirically, checked all tables and 24 was the good one
htmlRenderTime=60 # time to wait for page to render
pages=range(int(math.floor(dataRange[0]/dataPerPage)),int(math.floor(dataRange[1]/dataPerPage)))
outputFile='data%d-%d.csv'%(dataRange[0],dataRange[1])
# Open csv file and browser
virginHeader=True
with open(outputFile, 'wb') as f:
	writer = csv.writer(f, delimiter=',')
	# Go over all urls
	for num in pages:
		with closing(Firefox()) as browser:
			print "Doing pagenumber %d with %d entries"%(num,dataPerPage)
			#basic url structure, olny varying the page number and data per page
			url="http://www.mercurynews.com/salaries/bay-area?appSession=79628029457905&RecordID=&PageID=2&PrevPageID=2&CPIpage=2&cbCurrentPageSize=%d&cbJumpTo=%d"%(dataPerPage,num) 
			# use firefox to get page with javascript generated content
			browser.get(url)
			# wait for the page to load
			WebDriverWait(browser, timeout=htmlRenderTime)
			# store it to string variable
			page_source = browser.page_source
			page_source=page_source.encode('utf8')
			# Give html code a usable structure
			soup = BeautifulSoup(page_source)
			table=soup.find_all('table')[tableIdx]
			# find header to table and write if first time
			headers = [header.text for header in table.find_all('th')]
			if(virginHeader):
					writer.writerow(headers)
					virginHeader=False
			# get all data from table
			rows = []
			for row in table.find_all('tr'):
				rows.append([val.text.encode('utf8') for val in row.find_all('td')])
			# write data to csv
			writer.writerows(row for row in rows if row)
		