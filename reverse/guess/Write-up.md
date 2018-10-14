# guess
## **【原理】**

字符异或

## **【目的】**

掌握静态分析技术 当然动态调试也可以

## **【环境】**

Android

## **【工具】**

baksmali，JEB，dex2jar，MT管理器（手机上），jadx(太牛逼了)

## **【步骤】**

反编译成伪代码，然后分析Main3Activity，最后发现根据上一个Activity获得的结果对4取余决定了在大矩阵中的取用哪个小矩阵（在中switch块发现）（称为结果2）。在载入界面时，利用小矩阵和随机字符串生成了页面的提示（称为结果3 ）。从小矩阵就可以反推回上一结果（结果1），不需要找到动态生成的字符串（动态调试除外），因为是在每次循环中异或，所以前12个字符就是结果1的字符。剩下十二个依次异或即可。得到结果1后，根据选择小矩阵的数字来确定对应的字典，然后得到结果1中每个字符所对应的下标，该下标为FLAG-预留字符串的值，因此依次加回字符即可得到FLAG。

附解题脚本

```python
# coding:utf-8

temp2 = [70, 78, 66, 77, 66, 122, 109, 118, 110, 66, 110, 117, 37, 52, 55, 4, 57, 63, 47, 26, 42, 38, 22,40]  # 以case0为例

temp1 = [70, 78, 66, 77, 66, 122, 109, 118, 110, 66, 110, 117, 37, 52, 55, 4, 57, 63, 47, 26, 42, 38, 22, 40]

reserve = ['E', 'A', 'B', 'H', 'E', 'H', 'B', '2', 'O', '0', 'G', '9', 'P', 'M', 'G', 'K', 'Q', 'X', 'Z', 'H', 'A', 'S','T', 'V']

key0 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"

for i in xrange(24):
    temp1[i] = 0

for i in xrange(24):
    if i <= 11:
        temp1[23 - i] = temp2[23 - i] ^ temp2[i]
    else:
        temp1[23 - i] = temp2[23 - i]
k = 0
result = ""
for i in temp1:
    result += chr(key0.index(chr(i)) + ord(reserve[k]))
    k += 1
print result
```

JNCTF{hav1ng_fun_in_apk}

## **【总结】**

一定要耐心。