#!/usr/bin/python
# -*- coding: UTF-8 -*-
string = "JNCTF{Chinese_are_the_best_language}"
code = ""
for i in string:
    x = str(ord(i))
    for j in x:
        if int(j) == 0:
            code += "口"
        elif int(j) == 1:
            code += "由"
        elif int(j) == 2:
            code += "中"
        elif int(j) == 3:
            code += "人"
        elif int(j) == 4:
            code += "工"
        elif int(j) == 5:
            code += "大"
        elif int(j) == 6:
            code += "王"
        elif int(j) == 7:
            code += "夫"
        elif int(j) == 8:
            code += "井"
        elif int(j) == 9:
            code += "羊"
    code+=" "
print (code)