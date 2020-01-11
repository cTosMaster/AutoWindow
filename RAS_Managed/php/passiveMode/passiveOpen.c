#include <stdio.h>
#include <string.h>
#include <time.h>
#include <wiringPi.h>
 
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


int main(int argc, char *argv[]){

	if(wiringPiSetupGpio() == -1)
		return 1;

    if(argc < 2){
        printf("argv[1] : %s \n", argv[1]);
        return 3;
    }

    int count=0;
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
        int doorStat = digitalRead(magPin);
        if(strcmp(argv[1], "open") == 0){
            motor_reverseExec();
            count++;
            if(count >= 600){
                motorStop();
                count = 0;
                break;
            }    
        }
		else if(strcmp(argv[1], "close") == 0){
            motorExec();
            if(doorStat == 1){
                motorStop();
                break;
            }
        }   
        printf("count : %d \n", count);      
        printf("argv[1] : %s \n", argv[1]);
	}
	return 0; 
}
