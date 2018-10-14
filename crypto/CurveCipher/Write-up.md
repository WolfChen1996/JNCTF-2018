# JNCTF-2018 : *CurveCipher*（曲路密码）
## **【原理】**
	曲路密码
## **【目的】**
	加密
## **【环境】**
	windows	
## **【工具】**
	文本编辑器
	压缩密码破解器，如http://mydown.yesky.com/pcsoft/414246.html
## **【步骤】**
	拿到的文件是一个有密码的压缩包，尝试题目给的字符无果，使用暴力解密。得出压缩包密码ctf666。
![zippasswd](.\image\zippasswd.png)
​	加密思路为：将一段英文去空格后按一定字符个数平均分为若干组，从尾部起以曲路形式重组。本题密文为ratujs tnniwe vlsain eynrae leegdd uunvrc saiatt ssinyy
​	设置六行八列表格，按曲路填入密文
![CurveCipher](.\image\CurveCipher.png)
​	解密思路则为逆向分析：按约定的行列数对字符进行重组
​	得到明文为studentsstudyinjiangnanuniversityarealwaysclever

## **【总结】**
	曲路密码是一种换位密码，只要掌握其原理，按约定行列数设置表格填入字符即可解密

