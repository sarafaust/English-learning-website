import glob, os
import re
txt_basic = open("basic_aid.txt", "r").read()
print(txt_basic)
out_txt = txt_basic
for file in glob.glob("*.aid"):
    print(file)
    f = open(file, "r")
    data = f.read()
    x = re.findall(r'{\\rtf1[\S\n ]+?par }\n\n', data)
    for i in range(0,len(x)):
    	out_txt+=x[i]+"\n"
out_txt+="}"
f = open("out_aid.rtf", "a")
f.write(out_txt)
f.close()