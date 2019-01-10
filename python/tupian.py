from urllib.request import urlopen
from urllib.request import urlretrieve
from bs4 import BeautifulSoup
import re
import os

html = urlopen("https://item.taobao.com/item.htm?spm=a219r.lm893.14.23.62226f32E8jLe1&id=563358601230&ns=1&abbucket=6")
bsObj = BeautifulSoup(html,"html.parser")


Biyus = bsObj.findAll("img",{"data-src":re.compile(".*")})
title=bsObj.find("h3",{"class":"tb-main-title"})
name=title.text.strip().replace("\n", "").replace(' ','')
directory="D:\\wamp\\www\\shopMOOC\\JDCloth\\front\\images\\huowu\\低帮帆布鞋\\"+name
''' 写入文件'''
if not os.path.exists(directory):
    os.makedirs(directory)
fileOb = open(directory+'\\html.txt','w',encoding='utf-8')
price=bsObj.find("em",{"class":"tb-rmb-num"}).text
fileOb.write("name:"+name+"\n")
fileOb.write("价格:"+price+"\n")

des=bsObj.find("ul",{"class":"attributes-list"}).text
fileOb.write(des)
fileOb.close()


'''爬图片'''
i = 0
for Biyu in Biyus:
    filename =directory+'\\'+name[0]+str(i) +'.jpg'
    link=Biyu.attrs["data-src"]
    if link.startswith('https'):
        ()
    else:
        link="https:"+Biyu.attrs["data-src"]
    try:
        urlretrieve(link,filename)
    except:
        print("获取{}失败".format(link))
    i = i + 1

