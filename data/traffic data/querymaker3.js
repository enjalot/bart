var qs=require('querystring');
var request = require('request');
var fs = require('fs');
var _ = require('underscore');
var q = require('q');
var csv = require('csv');
var moment= require('moment');
var d3 = require('d3');
var jar = request.jar();
var station_ids = ["402824"];
var begin = moment('6/15/2013');
var end = moment('7/25/2013');
// var end = begin.add('days', 7);
// "http://pems.dot.ca.gov/?report_form=1&dnode=VDS&content=loops&tab=det_timeseries&export=xls&station_id=402814&s_time_id=1372636800&s_mm=7&s_dd=1&s_yy=2013&s_hh=0&e_time_id=1377907199&e_mm=8&e_dd=30&e_yy=2013&e_hh=23&tod=all&tod_from=0&tod_to=0&dow_0=on&dow_1=on&dow_2=on&dow_3=on&dow_4=on&dow_5=on&dow_6=on&holidays=on&q=flow&q2=&gn=hour&agg=on"
var site = "http://pems.dot.ca.gov/?";

var myForm = { 
  redirect: '',
  username: 'lewis500@gmail.com',
  password: 'housedv',
  login: 'Login' 
};

// 402827
// 402814
// 402816
// 402817
// 402818
// http://pems.dot.ca.gov/?report_form=1&dnode=VDS&content=loops&export=text&station_id=402814&s_time_id=1371686400&s_mm=6&s_dd=20&s_yy=2013&s_hh=0&e_time_id=1374883199&e_mm=7&e_dd=26&e_yy=2013&e_hh=23&tod=all&tod_from=0&tod_to=0&dow_0=on&dow_1=on&dow_2=on&dow_3=on&dow_4=on&dow_5=on&dow_6=on&holidays=on&q=flow&q2=occ&gn=hour&agg=on&lane1=on&lane2=on&lane3=on&lane4=on&lane5=on

request({
  uri: "http://pems.dot.ca.gov/",
  method: "POST",
  jar: jar,
  form: myForm
}, loggedIn);

function loggedIn(error, response, body){
  if(error) throw error;
  (function next(){
    if(!station_ids.length) return; // we're done!
    getStation(station_ids.pop(), next);
  })();
}

function getStation(station_id, cb){ //the thing we use to get the queries
  console.log("LOG:","bcallback");
  request({
    uri: "http://pems.dot.ca.gov/",
    qs: createQuery(station_id),
    method: "GET",
    jar: jar
  }, stationResponse.bind(this, station_id, cb));
}

function stationResponse(station_id, cb, error, response, body) { //parser and writer
  if(error) throw err;
  csv().from.string(body, { delimiter: '\t'})
    .transform(function(row, index){
      if(index == 0) return null;
      row[0] = (new Date(row[0])).getTime();
      return row;
    })
    .to.path(station_id + '.csv', {delimiter: ',', header: true, columns: ['time', 'flow', 'lanes', 'observed_percent']})
    .on('end', cb)
    // .on('end', function(){
    //    fs.writeFile(station_id + '.json', JSON.stringify(rows),'utf-8', cb);
    // })
    // error parsing the csv file. not formatted correctly?
    .on('error', cb);
}

function createQuery(station_id){
  return { 
    report_form: '1',
    dnode: 'VDS',
    content: 'loops',
    tab: 'det_timeseries',
    'export': 'text',
    station_id: station_id,
    s_time_id: begin.unix(),
    s_mm: begin.month(),
    s_dd: begin.date(),
    s_yy: begin.year(),
    s_hh: '0',
    e_time_id: end.unix(),
    e_mm: end.month(),
    e_dd: end.date(),
    e_yy: end.year(),
    e_hh: '23',
    tod: 'all',
    tod_from: '0',
    tod_to: '0',
    dow_0: 'on',
    dow_1: 'on',
    dow_2: 'on',
    dow_3: 'on',
    dow_4: 'on',
    dow_5: 'on',
    dow_6: 'on',
    holidays: 'on',
    q: 'flow',
    q2: 'occ',
    gn: 'hour',
    agg: 'on' 
  };
}