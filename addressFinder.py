from OmegaExpansion import onionI2C
import time
import sys

i2c = onionI2C.OnionI2C(0)
i2c.setVerbosity(1)

varhex = '0x00'
i = 0
while True:
	i = int(varhex,16)
	i += 1
	print (hex(i))
	varhex = hex(i)
	data = i2c.readBytes(i,0x00,4)
	print(data)
	i += 1
	if i == 127:
		break
	
