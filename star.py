from bs4 import BeautifulSoup
import requests
import datetime
import urllib

def crawl_house(url):
     result = []
     req = requests.get(url)
     soup = BeautifulSoup(req.text, "lxml")
     all_sections = soup.find_all('section',{'class':'property'}) 
     for section in all_sections:
        try:
            house_dict = {}
            title=section.find('h2',{'class':'product-title'}).text
            image="https:"+section.find('img',{'class':'image_List'}).get("data-src")
            price=section.find('div',{'class':'product-price'}).text
            location=section.find('p',{'class':'product-top-meta'}).text
            description=section.find('p',{'class':'product-description'}).text
            #bathroom=section.find('div',{'class':'real_estate__number_of_bathrooms'}).text
            #bedroom=section.find('div',{'class':'real_estate__number_of_bedrooms'}).text
            #area=section.find('div',{'class':'real_estate__size_living_space'}).text
            link=section.find('a',{'class':'product-link js_product-link'}).get('href')
            

            path="images/"+str(datetime.datetime.now().microsecond)+".jpg"
            resource = urllib.request.urlopen(image)
            output = open(path,"wb")
            output.write(resource.read())
            output.close()

            house_dict["path"]=path
            house_dict["title"]=title
            house_dict["price"]=price
            house_dict["location"]=location
            house_dict["description"]=description
            #house_dict["bathroom"]=bathroom
            #house_dict["bedroom"]=bedroom
            #house_dict["area"]=area
            house_dict["link"]=link

            result.append(house_dict)
        except Exception as e:
            print("exception occurred , continuing")
        

     return result

url = 'https://www.the-star.co.ke/classifieds/house-apartment-for-rent/house--nairobi'
crawl  = crawl_house(url)
with open("star2.json","w") as f:
    f.write(str(crawl)) 
