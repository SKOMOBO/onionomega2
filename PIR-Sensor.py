import time
import onionGpio
from datetime import datetime

#GPIOs
gpioNum = 8
LedPin = 0
LedLightTime = 1

pir = onionGpio.OnionGpio(gpioNum)
led = onionGpio.OnionGpio(LedPin)

led.setOutputDirection(0)
pir.setInputDirection()

while True:
	value = pir.getValue().rstrip()

	if(value == "1"):
		print datetime.now()
		print "Motion Detected"
		led.setValue(1)
		time.sleep(LedLightTime)
		led.setValue(0)
	else:
		print datetime.now()
		print "Nothing Detected"
		led.setValue(0)
		time.sleep(LedLightTime)
