#include "stdio.h"

void load(){

	char input[60];
	char buf[100];

	FILE *fptr;
    fptr= fopen("/home/ctf/flag.txt", "r");
    if (fptr == NULL)
    {
        printf("Error! File not found\n");
        return;
    }

    fgets(buf, 100, fptr);

    fclose(fptr);

 
    fgets(input, sizeof(input), stdin);

    printf(input);

    return;

}

int main(){
  
	printf("--Charm me if you can--\n");

	printf("Say the magic words: ");
	load();

	return 0;

}



