#include <stdio.h>
#include <string.h>
#include <stdint.h>

void user()
{
  char buf[64];
  gets(buf);

  puts(buf);

  return;
}

void init()
{
}

void me(uint16_t c)
{

  printf(">>\n");

  FILE *fd = fopen("home/ctf/flag.txt", "r");
  FILE *f = fopen("home/ctf/code.txt", "r");

  puts("Called");
  if (f == NULL)
  {
    printf("Error code.txt not found!\n");
    fflush(stdout);
  }
  if (fd == NULL)
  {
    printf("Error flag.txt not found!\n");
    fflush(stdout);
  }

  char buf[64];
  char flag[64];

  while (fgets(buf, sizeof(buf), f))
  {
    fgets(buf, sizeof(buf), f);
  }

  uint16_t *buf_as_uint64 = (uint16_t *)buf;

  if (*buf_as_uint64 == c)
  {
    while (fgets(flag, sizeof(flag), fd))
    {
      fgets(flag, sizeof(flag), fd);
    }

    puts("Well Well Well");
    puts(flag);
    return;
  }
}

int main()
{
  puts("Hmm!.. Worth giving a try>> ");
  user();

  return 0;
}
