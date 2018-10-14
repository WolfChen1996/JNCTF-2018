# JNCTF-2018 : MP3
## **【原理】**
	MP3隐写STEGO
## **【目的】**
	把文本隐写到MP3中
## **【环境】**
	windows
## **【工具】**
	MP3stego
	下载链接：https://pan.baidu.com/share/init?surl=c2q7rlI 提取码：vqq7
## **【步骤】**
	1.win+R打开运行输入cmd并进入
	2.cd到Decode.exe所在的文件夹
	3.把所需的MP3文件也拖到该文件夹
	4.输入 decode -X -P JNCTF JNCTF.mp3 （解密过程：decode -X -P （密码） （要解密的文件））
	  此处的密码就是MP3的文件名JNCTF
![1](.\image\1.png)
​	5.在文件夹中生成了JNCTF.mp3.txt，打开即可得到Flag:didi-shuaigeka
![2](.\image\2.png)
![3](.\image\3.png)

## **【总结】**
	只需认识MP3STEGO即可
