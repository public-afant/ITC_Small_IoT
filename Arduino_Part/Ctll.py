import serial

ser = serial.Serial('/dev/ttyACM0', 9600)
ser.isOpen()

for i in range(0,3):
    str1 = ""
    str1 = ser.readline()


str1 = str1.decode('utf-8')
str_comp = str1.replace("b'","")
str_list = str_comp.split()

humi = str_list[0]
temp = str_list[1]
print(humi+ "% / " + temp)




