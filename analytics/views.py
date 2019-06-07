from django.shortcuts import render,HttpResponse

# Create your views here.
def home(request):
    #return render(request,"index,html",None,None)
    return HttpResponse("<h1>Hello Humans!!</h1>")