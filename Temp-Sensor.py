from OmegaExpansion import onionI2C
import time
import sys
from datetime import datetime

print "Tempreture and Humidity sensor starting..."

i2c = onionI2C.OnionI2C(0)

i2c.setVerbosity(1)
devAddr = 0x28 #this is the only address that had a different value.
size = 4
addr = 0x01

while(1):
    value = i2c.readBytes(devAddr, addr, size)

    humidity = (((value[0] & 0x3F) << 8) + value[1]) / 16384.0 * 100
    tempreture = ((value[2] *64) + (value[3] >> 2)) / 16384.0 *165.0 - 40.0
    print("\n")
    print datetime.now()
    print("Humidity: "+ str(humidity))
    print("Tempreture: "+ str(tempreture)+"\n")
    time.sleep(3)
