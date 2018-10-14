# JNCTF-2018 : 神探夏洛克

## **【原理】**
内存取证

## **【目的】**
NULL

## **【环境】**
No requirement

## **【工具】**
volatility

## **【步骤】**
- 解压文件，根据提示可以发现文件是内存镜像,我们可以寻找当前进程

  ```sh
  $ volatility -f flag psscan
  Volatility Foundation Volatility Framework 2.6
  Offset(P)          Name                PID   PPID PDB        Time created                   Time exited
  ------------------ ---------------- ------ ------ ---------- ------------------------------ ------------------------------
  0x00000000012ef498 conime.exe         1912   1884 0x01fc00e0 2018-09-13 14:34:13 UTC+0000
  0x00000000013f6108 cmd.exe            1256   1408 0x01fc0300 2018-09-13 14:35:04 UTC+0000   2018-09-13 14:35:04 UTC+0000
  0x00000000013f7020 QQPYService.exe    1996   1144 0x01fc0240 2018-09-13 14:34:35 UTC+0000
  0x00000000013f9888 wmiprvse.exe        928    904 0x01fc0360 2018-09-13 14:34:24 UTC+0000
  0x000000000140b9a0 vmtoolsd.exe       1668   1516 0x01fc01a0 2018-09-13 14:34:03 UTC+0000
  0x000000000147b8b8 services.exe        668    624 0x01fc00a0 2018-09-13 14:33:47 UTC+0000
  0x000000000149e518 WinRAR.exe         1880   1516 0x01fc02e0 2018-09-13 14:34:12 UTC+0000
  0x00000000014a9900 svchost.exe        1080    668 0x01fc0160 2018-09-13 14:33:52 UTC+0000
  0x000000000150ab58 lsass.exe           680    624 0x01fc00c0 2018-09-13 14:33:47 UTC+0000
  0x000000000150cb90 VGAuthService.e    1292    668 0x01fc01c0 2018-09-13 14:33:54 UTC+0000
  0x0000000001605ca8 ctfmon.exe         1708   1516 0x01fc0280 2018-09-13 14:34:04 UTC+0000
  0x00000000016133f8 explorer.exe       1516   1500 0x01fc0220 2018-09-13 14:34:00 UTC+0000
  0x0000000001662a78 Poner.exe          1760   1516 0x01fc0260 2018-09-13 14:34:07 UTC+0000
  0x0000000001672840 svchost.exe         972    668 0x01fc0140 2018-09-13 14:33:52 UTC+0000
  0x00000000016773d8 vmacthlp.exe        856    668 0x01fc0100 2018-09-13 14:33:49 UTC+0000
  0x0000000001679438 vmtoolsd.exe       1408    668 0x01fc01e0 2018-09-13 14:33:58 UTC+0000
  0x00000000016bccd0 smss.exe            528      4 0x01fc0040 2018-09-13 14:33:37 UTC+0000
  0x00000000016c2438 winlogon.exe        624    528 0x01fc0080 2018-09-13 14:33:44 UTC+0000
  0x00000000016c6020 csrss.exe           600    528 0x01fc0060 2018-09-13 14:33:41 UTC+0000
  0x00000000016f0da0 ipconfig.exe        788   1256 0x01fc0340 2018-09-13 14:35:04 UTC+0000   2018-09-13 14:35:04 UTC+0000
  0x000000000176c690 svchost.exe        1108    668 0x01fc0180 2018-09-13 14:33:53 UTC+0000
  0x0000000001772548 svchost.exe         904    668 0x01fc0120 2018-09-13 14:33:51 UTC+0000
  0x00000000018317c0 System                4      0 0x01fc0020
  ```

- 可以发现WinRAR.exe说明师傅当前正在进行解压操作，我们可以寻找一下敏感文件

  ```sh
  $ volatility -f flag filescan | grep -E '.zip|.rar|.7z'
  Volatility Foundation Volatility Framework 2.6
  0x0000000001339a70      1      0 R--r-d \Device\HarddiskVolume1\Program Files\WinRAR\7zxa.dll
  0x000000000149a3b0      1      1 RW-rw- \Device\HarddiskVolume1\Documents and Settings\Administrator\Local Settings\Temporary Internet Files\Content.IE5\index.dat
  0x00000000014f6e80      2      1 RW-rw- \Device\HarddiskVolume1\Documents and Settings\Administrator\Local Settings\Temporary Internet Files\Content.IE5\index.dat
  0x00000000016c3968      1      1 RW-rw- \Device\HarddiskVolume1\Documents and Settings\Administrator\Local Settings\Temporary Internet Files\Content.IE5\index.dat
  0x00000000016ff228      2      0 R--r-- \Device\HarddiskVolume1\Documents and Settings\Administrator\桌面\flag.7z
  0x0000000001708470      1      1 R--r-- \Device\HarddiskVolume1\Documents and Settings\Administrator\桌面\flag.7z
  ```

- 发现flag.7z，dump下来

  ```sh
  $ volatility -f flag dumpfiles -Q 0x0000000001708470 -D .
  Volatility Foundation Volatility Framework 2.6
  DataSectionObject 0x01708470   None   \Device\HarddiskVolume1\Documents and Settings\Administrator\桌面\flag.7z
  SharedCacheMap 0x01708470   None   \Device\HarddiskVolume1\Documents and Settings\Administrator\桌面\flag.7z
  ```

- 解压文件

  ```sh
  $ 7z e file.None.0x810cfb88.dat
  
  7-Zip [64] 16.02 : Copyright (c) 1999-2016 Igor Pavlov : 2016-05-21
  p7zip Version 16.02 (locale=utf8,Utf16=on,HugeFiles=on,64 bits,8 CPUs x64)
  
  Scanning the drive for archives:
  1 file, 4096 bytes (4 KiB)
  
  Extracting archive: file.None.0x810cfb88.dat
  
  Enter password (will not be echoed):
  ```

- 需要密码，看提示师傅已经获得了密码，且正准备输入，我们看一下剪贴板

  ```sh
  $ volatility -f flag clipboard
  Volatility Foundation Volatility Framework 2.6
  Session    WindowStation Format                 Handle Object     Data
  ---------- ------------- ------------------ ---------- ---------- --------------------------------------------------
           0 WinSta0       CF_UNICODETEXT        0x7033b 0xe16afe18 81d1b8e730b010c3
           0 WinSta0       0x0L                     0x10 ----------
           0 WinSta0       0x0L                      0x0 ----------
           0 WinSta0       CF_TEXT                   0x0 ----------
           0 ------------- ------------------    0xe0264 0xe177e818
  ```

- 发现最近的一条paste信息，输入此密码，获得flag

  ```sh
  $ 7z e file.None.0x810cfb88.dat
  
  7-Zip [64] 16.02 : Copyright (c) 1999-2016 Igor Pavlov : 2016-05-21
  p7zip Version 16.02 (locale=utf8,Utf16=on,HugeFiles=on,64 bits,8 CPUs x64)
  
  Scanning the drive for archives:
  1 file, 4096 bytes (4 KiB)
  
  Extracting archive: file.None.0x810cfb88.dat
  
  Enter password (will not be echoed):
  
  WARNINGS:
  There are data after the end of archive
  
  --
  Path = file.None.0x810cfb88.dat
  Type = 7z
  WARNINGS:
  There are data after the end of archive
  Physical Size = 214
  Tail Size = 3882
  Headers Size = 182
  Method = LZMA2:12 7zAES
  Solid = -
  Blocks = 1
  
  Everything is Ok
  
  Archives with Warnings: 1
  
  Warnings: 1
  Size:       23
  Compressed: 4096
  
  $ cat flag
  JNCTF{Th1s_1s_2oo_4a3y}%
  ```


