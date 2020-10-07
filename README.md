# DCS_Stats

## SYNOPSIS

## REQUIREMENTS

1. Python 3.8 (Installed on DCS Server)
2. DCS Server
3. MYSQL Server
4. Web Server
5. Slmod version 7.5

## INSTALLATION

1. Setup items from the ## Requirements section
2. Save Get_Stat.bat and stat_collector.py to a directory on the DCS Server
3. Import stats.sql on mysql server
4. Edit stats_collector.py to complete the #MYSQL Setup section
5. Edit Get_Stats.bat to include the correct path for your python executable and the correct location of stat_collector.py
6. DCS Server re-start script (Windows Task Scheduler)
7. Task Scheduler task to run Get_Stats.bat before DCS Server Restart
