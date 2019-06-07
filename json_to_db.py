import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
import json
from pprint import pprint



def read_json_file(filename):
    with open(filename) as data_file:    
        data = json.load(data_file)
    pprint(data)
    i = 1
    for x in data:      
      x["id"] = i
      i=i+1
    pprint(data)  
    return data


def convert_dict_list_to_tuples_list(list):
    #new_list = [(key,)+tuple(val) for dic in list for key,val in dic.items()]
    #new_list = [(k, *v) for f in list for k,v in f.items()]
    print("list is "+str(list[0]))
    #return new_list

""" {'description': 'Excellent one bedroom room vacant privately gated detached '
                 'extension available to let along Ngong road close to the '
                 'green house off kirichwa lane at kirichwa...',
  'location': 'Nairobi',
  'path': 'images/819203.jpg',
  'price': ' KSh 16,000 ',
  'title': ' Stunning one bedroom off Ngong road kirichwa lane behind the '
           'green house '} """


def create_properties_crawled_table():
    try:
       connection = mysql.connector.connect(host='localhost',
                                 database='realestate',
                                 user='root',
                                 password='benson')       

       mycursor = connection.cursor()

       mycursor.execute("CREATE TABLE properties_crawled (id INT AUTO_INCREMENT PRIMARY KEY, description TEXT, location VARCHAR(1000), path VARCHAR(1000), price VARCHAR(1000), title VARCHAR(1000),link VARCHAR(1000))")

       print ("Table created successfully")

    except mysql.connector.Error as error :
        print("Failed create table {}".format(error))

    finally:
        #closing database connection.
        if(connection.is_connected()):
            mycursor.close()
            connection.close()
            print("connection is closed")
    

def insert_json_db(records_to_insert):
    try:
       connection = mysql.connector.connect(host='localhost',
                                 database='realestate',
                                 user='root',
                                 password='benson')     
       

       sql_insert_query = """ INSERT INTO properties_crawled (description, id, location, path, price, title,link) 
                           VALUES (%s,%d,%s,%s,%s,%s,%s) """

       cursor = connection.cursor(prepared=True)
       #used executemany to insert 3 rows
       result  = cursor.executemany(sql_insert_query, records_to_insert)
       connection.commit()
       print (cursor.rowcount, "Record inserted successfully into python_users table")

    except mysql.connector.Error as error :
        print("Failed inserting record into python_users table {}".format(error))

    finally:
        #closing database connection.
        if(connection.is_connected()):
            cursor.close()
            connection.close()
            print("connection is closed")


#read_json_file('star.json')

#create_properties_crawled_table()

insert_json_db(convert_dict_list_to_tuples_list(read_json_file('star.json')))