# NoPassword,NoFlag
## **【原理】**

CRC32碰撞。以及修改文件头和zip伪加密。

## **【目的】**

考察关于zip压缩包的知识

## **【环境】**

无

## **【工具】**

winrar，各种编辑器，python

## **【步骤】**

打开压缩包，发现一个flag.txt和一个小压缩包，尝试解压，发现都需要密码而且txt文件损坏，修复txt头部后仍需要密码，修改加密位后txt被解压出来。发现大文件内的内容为压缩包密码。打开小压缩包发现文件大小都为5个字节，进而想到是需要CRC碰撞。github上有各种脚本，跑出来就OK。

附脚本链接：https://github.com/kmyk/zip-crc-cracker

JNCTF{crc32_in_zip_may_not_be_safe}

## **【总结】**

无