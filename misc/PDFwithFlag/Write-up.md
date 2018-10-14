# JNCTF-2018 : 滑稽.pdf
## **【原理】**
	图片覆盖文字
## **【目的】**
	文字加密
## **【环境】**
	windows
## **【工具】**
	binwalk （需要python环境）https://github.com/ReFirmLabs/binwalk
	PDF编辑器，以Acrobat Reader DC为例
	下载链接：https://acrobat.adobe.com/cn/zh-Hans/acrobat/pdf-reader.html
	PDF转WORD工具
	例：http://pdftoword.cqttech.com/
## **【步骤】**
	首先发现是个zip，解压！发现是一个docx,看了看题目是PDF，而且打不开这个docx！这个docx肯定有问题！使用binwalk，如图显示这应该是个zip，于是把后缀docx改成zip，打开成功。当然如果不用工具也可以猜想后缀格式错误，尝试更改成常用的格式zip,pdf,png等，尝试是否有可能成功打开。
![binwalk](.\image\binwalk.png)
​	方法1：
​	使用PDF编辑器打开该文档，鼠标在图片上移动时发现在某部分出现编辑状态，此处隐藏文本!
![solution](.\image\solution.png)
​	直接点下去选中内容，复制粘贴到新建txt打开得到Flag：Interesting
![solution2](.\image\\solution2.png)
​	方法2：
​	使用PDF转WORD工具
![solution3](.\image\\solution3.png)
![solution4](.\image\\solution4.png)

## **【总结】**
	本题细心发现可直接用方法一得出Flag，也可暴力使用PDF转WORD工具