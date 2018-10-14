#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>

void getflag(void) {
    char flag[100];
    FILE *fp = fopen("./flag", "r");
    if (fp == NULL) {
        puts("get flag error");
	exit(0);
    }   
    fgets(flag, 100, fp);
    puts(flag);
}

void init() {
    setbuf(stdin, NULL);
    setbuf(stdout, NULL);
    setbuf(stderr, NULL);
}

void welcome() {
    printf("Welcome to Jiangnan University Cyber Security!");
    printf("Plz leave your name:");
}

void fun(void) {
    char buffer[100];
    read(STDIN_FILENO, buffer, 128);
}

int main(void) {
    init();
    pid_t pid;
    while(1) {
        pid = fork();
        if(pid < 0) {
 	    puts("fork error");
	    exit(0);
	}
	else if(pid == 0) {
    	    welcome();
	    fun();
	    puts("recv sucess");
	}
	else {
	    wait(0);
	}
    }
}
