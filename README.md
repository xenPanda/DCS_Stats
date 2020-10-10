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

1. Setup items from the ## Requirements section
2. Save Get_Stat.bat and stat_collector.py to a directory on the DCS Server
3. Import stats.sql on mysql server
4. Edit stats_collector.py to complete the #MYSQL Setup section
5. Edit Get_Stats.bat to include the correct path for your python executable and the correct location of stat_collector.py
6. Setup DCS Server Startup and Shut Down scheduler tasks on an interval that you want stats updated (RECOMMENDED: Daily)
<ul>
  <li>Create windows scheduler task to run DCSServerShutdown.bat script to shutdown DCS server</li>
  <li>Create windows scheduler task to run the Get_Stats.bat script 1 minute after the the shutdown task above</li>
  <li>Create windows scheduler task to Start DCS server with command (Your Path may be different)
    "C:\\Eagle Dynamics\DCS World OpenBeta Server\bin\DCS.exe" --server --norender -w serverName</li>
  </ul>
