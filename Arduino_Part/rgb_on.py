def rgbon(rgb):
    import serial

    ser = serial.Serial('/dev/ttyACM0', 9600, timeout=1)
    ser.close()
    if(ser.isOpen() == False):
        ser.open()
        
    rgb = str(rgb)

    
    #print(type(off))

    ser.write(rgb.encode())
    #ser.write(off.encode())
