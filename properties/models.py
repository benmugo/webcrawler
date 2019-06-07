from django.db import models

# Create your models here.
class Properties(models.Model):
    location=models.CharField(max_length=250)
    title=models.CharField(max_length=500)
    #price=price.CharField(max_length=500)
    #link=link.CharField(max_length=500)

    def __str__(self):
        return self.title+'--'+self.location