import serial
import time
from datetime import datetime

dataLength = 24	
PM1 = 0
PM25= 0
PM10= 0
port = serial.Serial("/dev/ttyS1", baudrate=9600, timeout=1)
data = port.read(dataLength)

while(1):
    data = port.read(dataLength)
    try:
        PM1 = str(ord(data[4]) + ord(data[5]))
        PM25 = str(ord(data[6]) + ord(data[7]))
        PM10 = str(ord(data[8]) + ord(data[9]))
   
        print datetime.now()
        print "PM1: " + PM1
        print "PM25: " + PM25
        print "PM10: " + PM10 +"\n"
        time.sleep(0.4)
        port.close()
        time.sleep(0.6)
        port = serial.Serial("/dev/ttyS1", baudrate=9600, timeout=1)

    except Exception as e:
        print "\nOut of bounds error! Retrying...\n"