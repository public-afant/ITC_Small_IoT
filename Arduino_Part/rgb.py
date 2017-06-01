import serial

ser = serial.Serial('/dev/ttyACM0', 9600, timeout=1)
ser.close()
if(ser.isOpen() == False):
    ser.open()
        
off = '000000000'

#ser.write(rgb.encode())
ser.write(off.encode())
