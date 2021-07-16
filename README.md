# DCS_Stats

## SYNOPSIS

## REQUIREMENTS

1. <a href="https://www.python.org/ftp/python/3.8.6/python-3.8.6-amd64.exe">Python 3.8 (Installed on DCS Server)</a>
2. DCS Server
3. MYSQL Server
4. Web Server
5. <a href="https://github.com/mrSkortch/DCS-SLmod/archive/master.zip">Slmod version 7.5</a>
6. Install Python slpp library via - pip install git+https://github.com/SirAnthony/slpp

## INSTALLATION

(For multi server setup you will need separate folders for each server for step 2)

1. Setup items from the ## Requirements section
2. Save Get_Stat.bat, stat_collector.py and config.ini to a folder or multiple folders in the case of multi server setups on the DCS Server
3. Import stats.sql on mysql server
4. Edit config.ini to complete the mysql and server sections (server name should be unique for each instance of config.ini)
5. Edit Get_Stats.bat to include the correct path for your python executable and the correct location of stat_collector.py
6. Setup DCS Server Startup and Shut Down scheduler tasks on an interval that you want stats updated (RECOMMENDED: Daily)
<ul>
  <li>Create windows scheduler task to run DCSServerShutdown.bat script to shutdown DCS server</li>
  <li>Create windows scheduler task to run the Get_Stats.bat script 1 minute after the the shutdown task above</li>
  <li>Create windows scheduler task to Start DCS server 5 minutes after the Get_stats.bat task above with command (Your Path may be different)
    "C:\\Eagle Dynamics\DCS World OpenBeta Server\bin\DCS.exe" --server --norender -w serverName</li>
  </ul>

## UPDATE FROM 7.5 version ***A clean install is recommended but if you choose you can try to update with the following steps***

How to update current install:


1.
Add new field to serverid VARCHAR 32 to tables:
airframe_stats
kills
pvp
traps
weapons

run sql command on each table Replace TABLENAME and CURRENT_SERVERID as appropriate
UPDATE `TABLE` SET `serverid`='CURRENT_SERVERID'

3.
Update players table to add:
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date NOT NULL



4. 
add new table servers to existing database with field serverid and make serverid primary key 

	CREATE TABLE `servers` (
	  `serverid` varchar(32) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

	ALTER TABLE `servers`
	  ADD PRIMARY KEY (`serverid`);

5.
Add new field to traps table
  `pts` float DEFAULT NULL,

6.
Update following files to new version
config.ini file 
stat_collector.py
html\greenierBoard.php 
html\includes.php
html\index.php
html\playerStats.php 
html\css\stats.css

7.
Add following new files
html\player.php
html\trap_data.php
html\top10.php
