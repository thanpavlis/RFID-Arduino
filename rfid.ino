#include <SPI.h>
#include <MFRC522.h>
#include <SPI.h>
#include <Ethernet.h>
#include <Arduino.h>
#include <TM1637Display.h>

#define RST_PIN 5               
#define SS_PIN  53
#define CLK 2
#define DIO 3

MFRC522 mfrc522(SS_PIN,RST_PIN);
IPAddress ip(192,168,1,5);
TM1637Display display(CLK,DIO);
EthernetClient client;

String id;
int counter;
byte mac[]={0xDE,0xAD,0xBE,0xEF,0xFE,0xED};
char response;

void setup(){
   Serial.begin(9600); // Initialize serial communications with the PC
   while (!Serial);    // Do nothing if no serial port is opened (added for Arduinos based on ATMEGA32U4)
   SPI.begin();        // Init SPI bus
   mfrc522.PCD_Init(); // Init MFRC522
   ShowReaderDetails();// Show details of PCD - MFRC522 Card Reader details

   display.setBrightness(30);
   counter=0;
   display.showNumberDec(counter,false,4,0);
   
   Serial.println(F("O rfid reader perimenei tags gia anagnwsh ..."));
   Serial.println(F("---------------------------------------------"));
   Serial.println();

   Ethernet.begin(mac,ip);
   Serial.println(F("Testing Ethernet ..."));
   postData("0000");//test connection
}

void loop(){
        //Look for new cards
        if (!mfrc522.PICC_IsNewCardPresent()) {
                return;
        }
 
        // Select one of the cards
        if (!mfrc522.PICC_ReadCardSerial()) {
                return;
        }
        
        id="";
        for (int i = 0; i < mfrc522.uid.size; i++) {
            id=id+String(mfrc522.uid.uidByte[i],HEX);
        }
        
        id.toUpperCase();
        Serial.println("UID:"+id);

        Serial.println("Posting Data To WebServer !!!");
        postData(id);
}

void postData(String uid){
      Serial.println("connecting...");
      if (client.connect("83.212.119.29",80))  {
             Serial.println("connected");
             client.println("POST /arduino/insert_uid.php HTTP/1.1");
             client.println("HOST: 83.212.119.29");
             client.println("Content-Type:application/x-www-form-urlencoded");
             client.print("Content-Length: ");
            
             String data = "uid="+uid;
             client.println(data.length());
             client.println();
             client.println(data);
        
             while(client.connected()){//read response
                while(client.available()){
                     response=client.read();
                     Serial.write(response);
                }
            }
            
            if(response=='0'){//anaxwrhsh uid
                counter--;
                display.showNumberDec(counter,false,4,0);
                Serial.println(F("Anaxwrhsh xrhsth !"));
            }else if(response=='1'){//afixh uid
                counter++;
                display.showNumberDec(counter,false,4,0);
                Serial.println(F("Afixh xrhsth !"));
            }else{//den iparxei to uid
                Serial.println(F("To uid den iparxei !"));
            }  
            client.stop();
    }
    else  {
          Serial.println(F("connection failed"));
    }
    Serial.println(F("-----------------------------------------------"));
    Serial.println(F("|O rfid reader perimenei tags gia anagnwsh ...|"));
    Serial.println(F("-----------------------------------------------"));
}

void ShowReaderDetails(){
     // Get the MFRC522 software version
     byte v = mfrc522.PCD_ReadRegister(mfrc522.VersionReg);
     Serial.print(F("MFRC522 Software Version: 0x"));
     Serial.print(v, HEX);
     if (v == 0x91)
         Serial.print(F(" = v1.0"));
     else if (v == 0x92)
         Serial.print(F(" = v2.0"));
     else
         Serial.print(F(" (unknown)"));
     Serial.println("");
     // When 0x00 or 0xFF is returned, communication probably failed
     if ((v == 0x00) || (v == 0xFF)) {
         Serial.println(F("WARNING: Communication failure, is the MFRC522 properly connected?"));
     }
}
