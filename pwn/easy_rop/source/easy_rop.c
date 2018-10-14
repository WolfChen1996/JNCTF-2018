#include <stdio.h>

int main()
{
    char buf[0x10];
    char welcome[47] = "Welcome to Jiangnan University Cyber Security!\n";
    printf("%s",welcome);
    printf("pwn me: ");
    fflush(0);
    sleep(3);
    read(0,buf,0x50f);
}
