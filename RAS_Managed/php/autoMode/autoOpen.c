#include <stdio.h>
#include <time.h>
#include <wiringPi.h>

#define rainPin 18 
#define ENA 24
#define ENB 25
#define motor1 12
#define motor2 16
#define motor3 20
#define motor4 21
#define magPin 5

void motorExec(){
    digitalWrite(motor1,HIGH);
    digitalWrite(motor2,LOW);
    digitalWrite(motor3,HIGH);
    digitalWrite(motor4,LOW);
    delay(10);
     
    digitalWrite(motor1,HIGH);
    digitalWrite(motor2,LOW);
    digitalWrite(motor3,LOW);
    digitalWrite(motor4,HIGH);
    delay(10);

    digitalWrite(motor1,LOW);
    digitalWrite(motor2,HIGH);
    digitalWrite(motor3,LOW);
    digitalWrite(motor4,HIGH);
    delay(10);

    digitalWrite(motor1,LOW);
    digitalWrite(motor2,HIGH);
    digitalWrite(motor3,HIGH);
    digitalWrite(motor4,LOW);
    delay(10); 
}

void motor_reverseExec(){
    digitalWrite(motor1, LOW);
    digitalWrite(motor2, HIGH);
    digitalWrite(motor3, HIGH);
    digitalWrite(motor4, LOW);
    delay(10);

    digitalWrite(motor1, LOW);
    digitalWrite(motor2, HIGH);
    digitalWrite(motor3, LOW);
    digitalWrite(motor4, HIGH);
    delay(10);

    digitalWrite(motor1, HIGH);
    digitalWrite(motor2, LOW);
    digitalWrite(motor3, LOW);
    digitalWrite(motor4, HIGH);
    delay(10);

    digitalWrite(motor1, HIGH);
    digitalWrite(motor2, LOW);
    digitalWrite(motor3, HIGH);
    digitalWrite(motor4, LOW);
    delay(10);
}

void motorStop(){
    digitalWrite(motor1, LOW);
    digitalWrite(motor2, LOW);
    digitalWrite(motor3, LOW);
    digitalWrite(motor4, LOW);
}


int main(void){
	if(wiringPiSetupGpio() == -1)
		return 1;

    int doorStat = 0;

	pinMode (rainPin, INPUT);
	pullUpDnControl(rainPin, PUD_UP);
    pinMode (magPin, INPUT);
    pullUpDnControl(magPin, PUD_UP);
	pinMode(ENA,OUTPUT);    // 보조 핀 
 	pinMode(ENB,OUTPUT);	// 
	pinMode (motor1, OUTPUT);
	pinMode (motor2, OUTPUT);
	pinMode (motor3, OUTPUT);
	pinMode (motor4, OUTPUT);
	digitalWrite(ENA, HIGH);
	digitalWrite(ENB, HIGH);

	printf("pin setting Successed! \n");

	while(1){
		int rainStat = digitalRead(rainPin);
        int magStat = digitalRead(magPin);
        if(rainStat == 0 && doorStat == 0){
            printf("rain stat1 = %d \n", rainStat);
            motorExec(); 
            if(magStat == 1){
                doorStat = 1;
            }        
		}
        else if(rainStat == 1 || doorStat == 1){
            printf("rain stat2 = %d \n", rainStat); 
            motorStop();
            if(magStat == 0)
                doorStat = 0;
        }
        printf("magStat = %d \n", magStat); 
	}

	return 0; 
}
