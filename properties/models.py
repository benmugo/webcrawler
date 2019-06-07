from django.db import models

# Create your models here.
class Properties(models.Model):
    location=models.CharField(max_length=250,blank=True,null=True)
    title=models.CharField(max_length=500,blank=True,null=True)
    price=models.CharField(max_length=500,blank=True,null=True)
    link=models.CharField(max_length=500,blank=True,null=True)
    image_path=models.CharField(max_length=2048,blank=True,null=True)
    description=models.TextField(max_length=2000,blank=True,null=True)
    bathroom=models.CharField(max_length=500,blank=True,null=True)
    bedroom=models.CharField(max_length=500,blank=True,null=True)
    area=models.CharField(max_length=500,blank=True,null=True)
    
    def __str__(self):
        return self.title+'--'+self.location