import mysql.connector
import smbus2
import bme280
import time

temp_data = []
humid_data = []

address = 0x76

bus = smbus2.SMBus(1)

calibration_params = bme280.load_calibration_params(bus, address)

# Connect to SQL database
mydb = mysql.connector.connect(
    host="192.168.62.162",
    user="root",
    password="Password1?",
    database="TeamProject"
)

cursor = mydb.cursor()


def collect_temp_data():
	data = bme280.sample(bus, address, calibration_params)
	temp = data.temperature
	return temp


def collect_humid_data():
    data = bme280.sample(bus, address, calibration_params)
    humid = data.humidity
    return humid


def save_data(temp_data, humid_data):
    for item in temp_data:
        cursor.execute("INSERT INTO `temp`(`temperature`) VALUES (%s);", (item,))
        mydb.commit()
    for item in humid_data:
        cursor.execute("INSERT INTO `humidity`(`humidity`) VALUES (%s);", (item,))
        mydb.commit()


def clear_old_data():
    # Delete all data except the last ten entries
    sql = "DELETE FROM temp"
    cursor.execute(sql)
    sql = "DELETE FROM humidity"
    cursor.execute(sql)
    mydb.commit()


while True:
    try:
        # Collect data every three seconds
        temp_data.append(collect_temp_data())
        humid_data.append(collect_humid_data())

        time.sleep(3)

        # Clear old data every 30 seconds
        if len(temp_data) >= 1:
            clear_old_data()
            save_data(temp_data, humid_data)
            temp_data = []
            humid_data = []

    except KeyboardInterrupt:
        print("Exiting...")
        break

# Close the connection when done
mydb.close()
