#!/usr/bin/python3

import RPi.GPIO as GPIO
import time
import mysql.connector

# Initialize GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setup(14, GPIO.OUT)
pwm = GPIO.PWM(14, 100)

# Print message
print("\nPress Ctrl+C to quit \n")

# Start PWM
dc = 0
pwm.start(dc)

def getSpeed():
	mydb = mysql.connector.connect(
	host="192.168.62.162",
	user="root",
	password="Password1?",
	database="TeamProject"
	)

	cursor = mydb.cursor()

	# Query the database for fan speed
	cursor.execute("SELECT speed FROM fan")
	fan_speed = cursor.fetchall()[0][0]# Assuming only one value is returned
	print("Fan Speed", fan_speed)
	dc = fan_speed  # Set the duty cycle to the fan speed retrieved from the database
	pwm.ChangeDutyCycle(dc)

	print("Fan duty cycle:", dc)

try:
    while True:
        getSpeed()
        time.sleep(1)  # Wait for 10 seconds before checking again

except KeyboardInterrupt:
    # Clean up
    pwm.stop()
    GPIO.cleanup()
    conn.close()  # Close the database connection
    print("Ctrl + C pressed -- Ending program")
