# Python3,not2
## **【原理】**

base系列加密

## **【目的】**

复习排列组合

## **【环境】**

Pyhton3

## **【工具】**

Python3

## **【步骤】**

根据提示和实际内容想到是不是base反复加密，题目说到是py3而不是py2，区别在于python3多了一个base85。利用排列组合尝试过后得到唯一正常答案。

附出题脚本：base64.b32encode(base64.b16encode(base64.b85encode(base64.b64encode(b'JNCTF{New_BAS3_new_lif3}'))))

JNCTF{New_BAS3_new_lif3}

## **【总结】**

无