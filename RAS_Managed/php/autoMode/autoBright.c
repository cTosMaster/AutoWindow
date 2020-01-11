#include<stdio.h>
#include<time.h>
#include<wiringPi.h>
#include<wiringPiSPI.h>

#define CS_MCP3008 6
#define SPI_CHANNEL 0
#define SPI_SPEED 1000000 
#define pdlc 17

int read_mcp3008_adc(unsigned char adcChannel){
	unsigned char buff[3];
	int adcValue = 0;
	buff[0] = 0x06 | ((adcChannel & 0x07) >> 2);
	buff[1] = ((adcChannel & 0x07) << 6);
	buff[2] = 0x00;
	digitalWrite(CS_MCP3008, 0);
	wiringPiSPIDataRW(SPI_CHANNEL, buff, 3);
	buff[1] = 0x0F & buff[1];
	adcValue = (buff[1] << 8) | buff[2];
	digitalWrite(CS_MCP3008, 1);

	return adcValue;
}

int main(void){
	int adcChannel = 0;
	int adcValue = 0;
	FILE *fp;
    

	if(wiringPiSetupGpio() == -1) return 1;
	if(wiringPiSPISetup(SPI_CHANNEL, SPI_SPEED) == -1) return 1;

	pinMode(CS_MCP3008, OUTPUT);
    pinMode(pdlc, OUTPUT);

	while(1){
		fp = fopen("uvlog.txt", "at");
        time_t now;
        time(&now);

		adcValue = read_mcp3008_adc(adcChannel);
		printf("adc Value = %u \n", adcValue);

        if(adcValue > 3800) {
            digitalWrite(pdlc, LOW);
		    fprintf(fp, "%s %u> Bright sense data logged.\n", ctime(&now), adcValue);
        }
        else digitalWrite(pdlc, HIGH);

        delay(200);
        fclose(fp);
	}
	return 0;
}
