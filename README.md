BART strike visualization
=========================



# Story Outline
* Short history of BART / overview of area it covers

### How big is BART?
* What is it's total budget?
	+ What does it's budget look like? How much for employees?
	+ How many tax dollars does it cost? Cost to individual taxpayer?

* How many people ride BART?
	+ Which stations have most ridership?
	
* How much value does BART add to the area?
  
### What is causing the BART strike?
* What is the history of BART/union negotiations?
	+ History of voting results on transportation ballot measures <http://www.mtc.ca.gov/maps_and_data/GIS/maps/monthly/TranspoBallotResults-BAvsSTATE.pdf>
* What are the points of contention?
	+ Pay
	+ Pensions
	+ Medical benefits

* How much do BART employees make? (Pay)
	+ What employees make the most? What do they do? 
	+ How do BART employees salaries compare to others in transit industry?
	+ How do BART employee salaries compare to inflation?
	+ Are employees making more/less than they did 10 years ago? 20?
	+ How do BART employee salaries compare to salaries in the bay area? How do they compare to tech employees?


# Sketches

* Non-management Salaries with crossfilter and simple statistics http://tributary.io/inlet/6148096
* Management salaries http://tributary.io/inlet/6153614
* Inflation vs raises http://tributary.io/inlet/6153454
* BART map with stations as JSON http://tributary.io/inlet/6148762
* Animating on a BART line http://tributary.io/inlet/6149065
* BART monthly ridership http://tributary.io/inlet/6149542
* Income with inflation - previous and projected ( http://tributary.io/inlet/6152634 )

# Data Links

BART Data  
* Employee Salaries https://docs.google.com/spreadsheet/ccc?key=0AiFtsy5d3JwNdE9tOWRtbmh5WTJSYnpaNktwUWJjYnc#gid=3  
*   scraped from http://www.mercurynews.com/salaries/bay-area
* Ridership http://www.bart.gov/about/reports/ridership.aspx
* BART's 2013 financials are available in a PDF (page 5) http://www.bart.gov/docs/financials/FY2013_BART_Budget.pdf
* Article comparing transit salaries in other cities with BART http://www.mercurynews.com/bart/ci_23742276/bart-workers-paychecks-already-outpace-their-peers
* Here's a good overview read from Mother Jones: http://www.motherjones.com/mojo/2013/07/bay-area-transit-strike-why-it-matters
* https://en.wikipedia.org/wiki/Bay_Area_Rapid_Transit
* http://en.wikipedia.org/wiki/History_of_the_Bay_Area_Rapid_Transit
* Municiple tax shelters http://groups.yahoo.com/group/BATN/message/42479
* Median income at BART stations http://dangrover.github.io/sf-transit-inequality https://github.com/dangrover/sf-transit-inequality
* July 30 article on strike http://www.timesheraldonline.com/news/ci_23773852/unions-may-issue-72-hour-notice-strike-if

Highway Data  
* Traffic volume on Cali highways (search for bay bridge) http://www.dot.ca.gov/hq/traffops/saferesr/trafdata/2012TrafficVolumes.pdf
* HOV lane data http://www.dot.ca.gov/dist4/highwayops/docs/2011%20Revised%20HOV%20Report.pdf
* Traffic data http://www.dot.ca.gov/hq/traffops/saferesr/trafdata/index.htm

Surrounding Data  
* Bay Area census http://www.bayareacensus.ca.gov/historical/historical.htm (countypopulations.csv top10cities.csv)
* U.S. monthly inflation http://www.usinflationcalculator.com/inflation/historical-inflation-rates/ (stored in monthlyinflation.csv)
* BLS U.S. Historical Wage Data, 2001 - 2013 (Current Dollar) ftp://ftp.bls.gov/pub/suppl/eci.echistrynaics.txt
* CA MTC http://dataportal.mtc.ca.gov/spatial-library.aspx
* GIS data (maps, census) http://www.mtc.ca.gov/maps_and_data/GIS/data.htm (shp files converted to geojson and topojson)
* US Atlas https://github.com/mbostock/us-atlas
* US Cost of Living: http://cost-of-living.findthedata.org/l/60/San-Francisco-CA-Metro-Area
* I'd be interested in looking at the property values surrounding BART stations with the Trulia API http://developer.trulia.com/

Industry Classification via BLS:
Transportation and Warehousing: NAICS 48-49
The transit and ground passenger transportation subsector (NAICS 485) consists of these industry groups:
* Urban Transit Systems: NAICS 4851
* Interurban and Rural Bus Transportation: NAICS 4852
* Taxi and Limousine Service: NAICS 4853
* School and Employee Bus Transportation: NAICS 4854
* Charter Bus Industry: NAICS 4855
* Other Transit and Ground Passenger Transportation: NAICS 4859

# Background Links
* SF Transit History http://sftransithistory.com/

# Code Links

* http://d3js.org
* http://square.github.io/crossfilter/
* http://macwright.org/simple-statistics/
* https://github.com/Niggler/js-xlsx
* http://exposedata.com/tutorial/chord/
