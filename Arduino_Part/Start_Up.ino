#include <DHT11.h>

int pinHumi = A2;
int pinRed = 9;
int pinGreen = 11;
int pinBlue = 10;
int feq = 100;
char cTemp;
String sCommand = "";
int intRGB[]={};



DHT11 dht11(pinHumi);
void setup()
{
    pinMode(pinRed,OUTPUT);
    pinMode(pinGreen,OUTPUT);
    pinMode(pinBlue,OUTPUT);
  Serial.begin(9600);
}
void loop()
{

  humi();
  sCommand = "";
  
  while(Serial.available()>0){

    cTemp = Serial.read();
    sCommand.concat(cTemp);
    delay(10);
    Serial.println(sCommand);
  }

  
  if(sCommand != "" )
  {    
    Serial.println(sCommand);
    
      char cTempData[4];
      
     sCommand.substring(0, 3).toCharArray(cTempData, 4);
     int nR = atoi(cTempData);
      Serial.println(nR);
     sCommand.substring(3, 6).toCharArray(cTempData, 4);
     int nG = atoi(cTempData);
      Serial.println(nG);
     sCommand.substring(6, 9).toCharArray(cTempData, 4);
     int nB = atoi(cTempData);
     Serial.println(nB);
     
        analogWrite(pinRed,nR);
        analogWrite(pinGreen,nG);
        analogWrite(pinBlue,nB);
      
     Serial.print(sCommand + ":" + nR + "," + nG + "," + nB );
     delay(100);

    
      
   }
}




void humi(){
  int err;
  float temp=0.f;
  float humi=0.f;
  if((err=dht11.read(humi, temp))==0)
  {
    Serial.print((int)humi);
    Serial.print("   ");
    Serial.println((int)temp);
  }
    delay(700);
}


