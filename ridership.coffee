xl = require 'xlsx'
async = require 'async'
fs = require 'fs'
path = require 'path'
d3 = require 'd3'


dir = path.join(__dirname, "data/ridership/ridership_2012/")

files = fs.readdirSync(dir)
console.log("files", files)


#Regular expression for splitting the column name letters and numbers out
#e.g. AT23 => ["AT23", "AT", "23"]
colRe = new RegExp(/([A-Z]+)([0-9]+)/)
getColumnRow = (key) ->
  match = colRe.exec(key)
  return unless match
  letters = match[1]
  #we only want A -> AT
  if letters.length == 2
    return if letters > "AT"
    col = 25 + letters.slice(1).charCodeAt(0) - 66
  else
    return if letters < "A"
    col = letters.charCodeAt(0) - 64 #start at A = 1
  row = match[2]
  [col,+row]


async.map files.slice(0,1), (file, fileCb) ->
  console.log "file", file
  filePath = path.join dir, file
  parsed = xl.readFile(filePath)
  parsed.SheetNames.slice(0,1).forEach (name) ->
    matrix = d3.range(45).map (d) ->
      return d3.range(42)
    cols = d3.range(42).map -> 0
    rows = d3.range(42).map -> 0
    sheet = parsed.Sheets[name]
    keys = Object.keys(sheet)
    keys.forEach (key) ->
      match = colRe.exec(key)
      pair = getColumnRow(key)
      return if not pair or not pair[0]
      #cols 0 -> 42 are the counts per station
      #rows from 2 -> 44 are the counts per station
      col = pair[0] - 2
      row = pair[1] - 2
      if col == -1 and row >= 0
        console.log("PAIR", pair)
        console.log key, sheet[key]
        rows[row-1] = sheet[key].v
        return
      if row == 0
        console.log("PAIR", pair)
        console.log key, sheet[key]
        cols[col] = sheet[key].v
        return
      # zero index row
      row -= 1
      if row > 44 or row < 0
        return
      #console.log 'el', col, row, sheet[key].v
      matrix[row][col] = sheet[key].v

    console.log "matrix", matrix
    console.log "cols", cols
    console.log "rows", rows
  fileCb()
, (err, results) ->
  console.log "done"

"""
sheet { A1: { v: 'Exit stations', t: 's', r: 'Exit stations' },
  B1: { v: 'Entry stations->', t: 's', r: 'Entry stations->' },
  D1: { v: 'WEEKDAY', t: 's', r: 'WEEKDAY' },
  G1: { v: 'Apr 12', t: 'str', raw: 41000, rawt: 'n' },
  B2: { v: 'RM', t: 's', r: 'RM' },
  C2: { v: 'EN', t: 's', r: 'EN' },
  D2: { v: 'EP', t: 's', r: 'EP' },
  E2: { v: 'NB', t: 's', r: 'NB' },
  F2: { v: 'BK', t: 's', r: 'BK' },
  G2: { v: 'AS', t: 's', r: 'AS' },
  H2: { v: 'MA', t: 's', r: 'MA' },
  I2: { v: 19, t: 'n' },
  J2: { v: 12, t: 'n' },
  K2: { v: 'LM', t: 's', r: 'LM' },
  L2: { v: 'FV', t: 's', r: 'FV' },
  M2: { v: 'CL', t: 's', r: 'CL' },
  N2: { v: 'SL', t: 's', r: 'SL' },
  O2: { v: 'BF', t: 's', r: 'BF' },
  P2: { v: 'HY', t: 's', r: 'HY' },
  Q2: { v: 'SH', t: 's', r: 'SH' },
  R2: { v: 'UC', t: 's', r: 'UC' },
  S2: { v: 'FM', t: 's', r: 'FM' },
  T2: { v: 'CN', t: 's', r: 'CN' },
  U2: { v: 'PH', t: 's', r: 'PH' },
  V2: { v: 'WC', t: 's', r: 'WC' },
  W2: { v: 'LF', t: 's', r: 'LF' },
  X2: { v: 'OR', t: 's', r: 'OR' },
  Y2: { v: 'RR', t: 's', r: 'RR' },
  Z2: { v: 'OW', t: 's', r: 'OW' },
  AA2: { v: 'EM', t: 's', r: 'EM' },
  AB2: { v: 'MT', t: 's', r: 'MT' },
  AC2: { v: 'PL', t: 's', r: 'PL' },
  AD2: { v: 'CC', t: 's', r: 'CC' },
  AE2: { v: 16, t: 'n' },
  AF2: { v: 24, t: 'n' },
  AG2: { v: 'GP', t: 's', r: 'GP' },
  AH2: { v: 'BP', t: 's', r: 'BP' },
  AI2: { v: 'DC', t: 's', r: 'DC' },
  AJ2: { v: 'CM', t: 's', r: 'CM' },
  AK2: { v: 'CV', t: 's', r: 'CV' },
  AL2: { v: 'ED', t: 's', r: 'ED' },
  AM2: { v: 'NC', t: 's', r: 'NC' },
  AN2: { v: 'WP', t: 's', r: 'WP' },
  AO2: { v: 'SS', t: 's', r: 'SS' },
  AP2: { v: 'SB', t: 's', r: 'SB' },
  AQ2: { v: 'SO', t: 's', r: 'SO' },
  AR2: { v: 'MB', t: 's', r: 'MB' },
  AS2: { v: 'WD', t: 's', r: 'WD' },
  AT2: { v: 'Exits', t: 's', r: 'Exits' },
"""
