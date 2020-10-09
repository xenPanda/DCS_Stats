# DCS Stat Collection via Slmod and insert into MySql DB

# Author: Chris Barilla (Panda)
# Date:   09/05/2020

# Filename: stat_collector.py
# Version: 0.0.1

import mysql.connector
# pip install git+https://github.com/SirAnthony/slpp
from slpp import slpp as lua
from datetime import datetime

#MySQL Setup
db = mysql.connector.connect(
  host="",
  user="",
  passwd="",
  database=""
)
mycursor = db.cursor()
#End MySQL Setup

# SlmodStats File Location
slmod_data = "C:\\Users\\root\\Saved Games\\Server\\Slmod\\SlmodStats.lua"
#End SlmodStats File Location

def insert_weapon_stats(weapon_stats):
    sql = "INSERT INTO weapons (playerid, airframe, weapon, hit, kills, shot, numHits) VALUES (%(playerid)s,%(airframe)s, %(weapon)s, %(hit)s, %(kills)s, %(shot)s, %(numHits)s) ON DUPLICATE KEY UPDATE hit = VALUES(hit), kills = VALUES(kills), shot = VALUES(shot), numHits = VALUES(numHits)"
    mycursor.execute(sql, weapon_stats)
    db.commit()

def insert_lso_grade(lso_grade):
    sql = "INSERT IGNORE INTO traps (playerid, airframe, trap_no, grade, comment, wire, date) VALUES (%(playerid)s,%(airframe)s, %(trap_no)s, %(grade)s, %(comment)s, %(wire)s, %(date)s)"
    mycursor.execute(sql, lso_grade)
    db.commit()

def insert_pvp_stats(pvp_stats):
    sql = "INSERT INTO pvp (playerid, airframe, result, number) VALUES (%(playerid)s,%(airframe)s, %(result)s, %(number)s) ON DUPLICATE KEY UPDATE number = VALUES(number)"
    mycursor.execute(sql, pvp_stats)
    db.commit()

def insert_kill_stats(kill_stats):
    sql = "INSERT INTO kills (playerid, airframe, kill_type, kill_sub_type, kill_no) VALUES (%(playerid)s,%(airframe)s, %(kill_type)s, %(kill_sub_type)s, %(kill_no)s) ON DUPLICATE KEY UPDATE kill_no = VALUES(kill_no)"
    mycursor.execute(sql, kill_stats)
    db.commit()

def new_player_db_insert(db_player_info):

    sql = "INSERT INTO players (id, playername) VALUES (%(playerid)s,%(playername)s) ON DUPLICATE KEY UPDATE playername = VALUES(playername)"
    mycursor.execute(sql, db_player_info)
    db.commit()

def insert_player_stats(db_player_stats):

    sql = "INSERT INTO airframe_stats (airframe, playerid, total_time, air_time, pilot_deaths, crash_deaths, ejection_deaths) VALUES (%(airframe)s,%(playerid)s,%(total_time)s,%(air_time)s,%(pilot_deaths)s,%(crash_deaths)s,%(ejection_deaths)s) ON DUPLICATE KEY UPDATE total_time = VALUES(total_time), air_time = VALUES(air_time), pilot_deaths = VALUES(pilot_deaths), crash_deaths = VALUES(crash_deaths), ejection_deaths = VALUES(ejection_deaths)"
    mycursor.execute(sql, db_player_stats)
    db.commit()

def airframe_stats(playerid, airframe):
    airframe_total_time = player.get(playerid).get('times', {}).get(airframe, {}).get('total', 0)
    airframe_in_air = player.get(playerid).get('times').get(airframe).get('inAir', 0)
    total_deaths = player.get(playerid).get('times', {}).get(airframe, {}).get('actions', {}).get('losses', {}).get('pilotDeath', 0)
    crash_deaths = player.get(playerid).get('times', {}).get(airframe, {}).get('actions', {}).get('losses', {}).get('crash', 0)
    ejection_deaths = player.get(playerid).get('times', {}).get(airframe, {}).get('actions', {}).get('losses', {}).get('eject', 0)
    return airframe_total_time, airframe_in_air, total_deaths, crash_deaths, ejection_deaths

file = open(slmod_data)
data = file.read()
file.close()
d1 = data.split('stats =')[1]
#print(d1)
player = lua.decode(d1)
#print(player)
player.pop('host', None)
for key, value in player.items():
    playerid = key
    player_name_list = list(player[playerid]['names'].values())
    playername = player_name_list[-1]
    for k, v in player[playerid]['times'].items():
        airframe = k
        airframe_total_time, airframe_in_air, total_deaths, crash_deaths, ejection_deaths = airframe_stats(playerid, airframe)
        db_player_info = {
            'playerid' : playerid,
            'playername' : playername,
        }
        new_player_db_insert(db_player_info)
        db_player_stats = {
            'airframe' : airframe,
            'playerid' : playerid,
            'total_time' : airframe_total_time,
            'air_time' : airframe_in_air,
            'pilot_deaths' : total_deaths,
            'crash_deaths' : crash_deaths,
            'ejection_deaths' : ejection_deaths,
        }
        insert_player_stats(db_player_stats)
        #print(playername + " - " + playerid)
        #print(airframe)
        #print('Airframe Total Time: ', airframe_total_time)
        #print('Airframe In Air Time: ', airframe_in_air)
        #print('Total Pilot Deaths: ', total_deaths)
        #print('Crash Deaths: ', crash_deaths)
        #print('Ejection Deaths: ', ejection_deaths)
for key, value in player.items():
    playerid = key
    for k, v in player[playerid]['times'].items():
        #print(k)
        airframe = k
        for weapon in v.get('weapons', {}).items():
            #print(weapon)
            weapon_stats_dict = weapon[1]
            weapon_type = weapon[0]
            numHits = weapon_stats_dict['numHits']
            hit = weapon_stats_dict['hit']
            kills = weapon_stats_dict['kills']
            shot = weapon_stats_dict['shot']
            weapon_stats = {
                'playerid' : playerid,
                'airframe' : airframe,
                'weapon' : weapon_type,
                'numHits' : numHits,
                'hit' : hit,
                'kills' : kills,
                'shot' : shot,
            }
            insert_weapon_stats(weapon_stats)
for key, value in player.items():
    playerid = key
    #print(playerid)
    for k, v in player[playerid]['times'].items():
        #print(k)
        airframe = k
        #print(airframe)
        for type in v.get('kills', {}).items():
            #print(kills)
            kill_type = type[0]
            #print(kill_type)
            for sub_type in type[1].items():
                kill_sub_type = sub_type[0]
                if kill_sub_type != 'total':
                    #print(kill_sub_type)
                    kill_no = sub_type[1]
                    #print(kill_no)
                    kill_stats = {
                        'playerid' : playerid,
                        'airframe' : airframe,
                        'kill_type' : kill_type,
                        'kill_sub_type' : kill_sub_type,
                        'kill_no' : kill_no,
                    }
                    insert_kill_stats(kill_stats)
        for pvp in v.get('pvp', {}).items():
            pvp_result = pvp[0]
            pvp_number = pvp[1]
            pvp_stats = {
                'playerid' : playerid,
                'airframe' : airframe,
                'result' : pvp_result,
                'number' : pvp_number,
            }
            insert_pvp_stats(pvp_stats)
        for lso in v.get('actions', {}).get('LSO', {}).get('grades', {}).items():
            #print(lso)
            trap_no = lso[0]
            grade_line = lso[1].split('GRADE:')[1]
            grade = grade_line.split(' : ')[0]
            comment = grade_line.split(' : ')[1]
            wire = comment.split('WIRE#' )[1]
            wire = wire[1]
            now = datetime.now()
            date = now.strftime('%Y-%m-%d')
            #print(date)
            lso_grade = {
                'playerid' : playerid,
                'airframe' : airframe,
                'grade' : grade,
                'comment' : comment,
                'wire' : wire,
                'trap_no' : trap_no,
                'date' : date,
            }
            insert_lso_grade(lso_grade)


