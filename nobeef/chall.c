#include <stdio.h>
#include <stdlib.h>
#include <signal.h>
#include <unistd.h>

#define SECRET_VALUE 0xBEEFBEEF


void gadget1() {
  asm volatile ("nop"); 
  for (int i = 0; i < 10; i++) {
    asm volatile ("nop");
  }
}

void gadget2(int val) {
  if (val == SECRET_VALUE) {
    printf("Hidden value accessed!\n");
  }
}

void call() {
  int junk = 0;
  for (int i = 0; i < 100; i++) {
    junk += i;
  }
  asm volatile ("nop");  

}


int fun() {
  char c;
  FILE *fptr;

  printf("Yo this will help you!\n");

  fptr = fopen("/home/ctf/file.txt", "r");
  if (fptr == NULL)
  {
      printf("Cannot open file. If on local create file.txt\n");
      gadget2(SECRET_VALUE);  
      exit(0);
  }

  c = fgetc(fptr);
  while (c != EOF)
  {
      printf ("%c", c);
      c = fgetc(fptr);
  }

  printf("\n");
  fclose(fptr);
  fflush(stdout);

  gadget1();  
  gadget1();  
 
  return 0;
}

void prompt() {
  printf("Wait... authentication underway.. \n");
  sleep(1);
  printf("Authenticating credentials .. .. ");
  sleep(3);
  printf("mystic@player: \n");
  sleep(2);
  printf("Malicious activity detected.. \n");
  sleep(1);
  printf("Terminating!!\n");
  sleep(15);
  asm volatile ("int $0x80");  
  exit(SIGSEGV);
}

int main() {
  signal(SIGSEGV, prompt);  
  setvbuf(stdout, NULL, _IONBF, 0); 

  unsigned int val;
  printf("Good luck trying a smashing attack here: ");
  scanf("%x", &val);
  printf("You input 0x%x\n", val);

  void (*fun_ptr)(void) = (void (*)())val;
  fun_ptr();
  
}
