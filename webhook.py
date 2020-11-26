import requests #dependency
import json
import mysql.connector
from datetime import datetime, date, timedelta

#MySQL Setup
db = mysql.connector.connect(
  host="vcsg3.com",
  user="uzfjsveo_statmanager",
  passwd="2O#-9a}0qn[J",
  database="uzfjsveo_csg3_stats"
)
mycursor = db.cursor()
#End MySQL Setup

yesterday = date.today() - timedelta(days=1)
date = yesterday.strftime('%Y-%m-%d')
yesterday = yesterday.strftime('%m-%d-%Y')
myDate = '2020-10-27'

sql = "SELECT airframe, wire, grade, comment, playername from traps LEFT JOIN players on traps.playerid = players.id WHERE date = %s"
mycursor.execute(sql, (date,))
traps = mycursor.fetchall()
print("Total number of rows is: ", mycursor.rowcount)

url = "https://discord.com/api/webhooks/779398651746975774/LDrJM6iahw9rMM02TunYCBHtbeakHKtP3kM4lP09Ft_dC5QsVrwFfImPE6zDWzOMnmMw" #webhook url, from here: https://i.imgur.com/aT3AThK.png
# vcsg lso channel https://discord.com/api/webhooks/779967158444490802/88BqbbEIqJzVv6fiuVeGr0zj-veacVeNQJZ11AlV5cEI8UkUZn4TYrgBpeRpV4j_TO7N
data = {}
#for all params, see https://discordapp.com/developers/docs/resources/webhook#execute-webhook
data["content"] = "Traps for " + yesterday
data["username"] = "AirBot"

#leave this out if you dont want an embed
data["embeds"] = []

#for all params, see https://discordapp.com/developers/docs/resources/channel#embed-object

for trap in traps:
            embed = {}
            airframe = trap[0]
            wire = trap[1]
            grade = trap[2]
            comment = trap[3]
            playerName = trap[4]
            print(playerName +" , " + airframe + " , " + grade + " , " + comment)
            embed["description"] = airframe + " , " + grade + " , " + comment
            embed["title"] = playerName
            embed["color"] = 7781688
            data["embeds"].append(embed)
result = requests.post(url, data=json.dumps(data), headers={"Content-Type": "application/json"})

try:
    result.raise_for_status()
except requests.exceptions.HTTPError as err:
    print(err)
else:
    print("Payload delivered successfully, code {}.".format(result.status_code))

if (db.is_connected()):
    db.close()
    mycursor.close()
    print("MySQL connection is closed")


