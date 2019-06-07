from django.shortcuts import render,HttpResponse
import json
from .models import Properties
from .crawler import crawl_house
import time

def home(request):
    if request.method=="POST":
        file_path=str(int(time.time()*1000))+'star.json'
        # url = 'https://www.the-star.co.ke/classifieds/house-apartment-for-rent/house--nairobi'
        url=request.POST['url']
        crawl  = crawl_house(url)
        with open(file_path,"w") as f:
            f.write(str(crawl)) 

        f = open(file_path, "r+")
        new_string=f.read().replace('\'','"')
        f.write(new_string)

        with open(file_path) as file:
            data=json.load(file)
            for prop in data:
                p1=Properties()
                p1.location=prop['location']
                p1.title=prop['title']
                p1.price=prop['price']
                p1.link=prop['link']
                p1.image_path=prop['path']
                p1.description=prop['description']
                #p1.bedroom=prop['bedroom']
                #p1.area=prop['area']
                #p1.bathroom=prop['bathroom']
                p1.save()
        all_props=Properties.objects.all()
        return render(request,"index.html",{'my_properties':all_props},None)
    else:
        all_props=Properties.objects.all()
        return render(request,"index.html",{'my_properties':all_props},None)

#def crawl (request):
    #if request.method=="POST":
