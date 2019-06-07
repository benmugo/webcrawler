from django.shortcuts import render,HttpResponse
import json
from .models import Properties

# Create your views here.
# Create your views here.
def home(request):
    if request.method=="POST":
        print("crawl here...")
        with open("star2_formatted.json") as file:
            data=json.load(file)
            for prop in data:
                p1=Properties()
                p1.location=prop['location']
                p1.title=prop['title']
                #p1.price=prop['price']
                #p1.link=prop['link']
                p1.save()
        return HttpResponse("Done inserting to db")
    else:
        all_props=Properties.objects.all()
        return render(request,"index.html",{'my_properties':all_props},None)

#def crawl (request):
    #if request.method=="POST":
