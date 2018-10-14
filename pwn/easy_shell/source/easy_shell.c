#include<stdio.h>

void init() {
    setbuf(stdin, NULL);
    setbuf(stdout, NULL);
    setbuf(stderr, NULL);
}

int main(){
    init();
    printf("Welcome to Jiangnan University Cyber Security!\n \
            Here is your flag!\n");
    alarm(1);
    system("ls");
    execve("/bin/sh",NULL,NULL);
    return 0;
}
