## My laravel project, mainly for practice purpose. 

* I use it myself like a book of topics, that I have to store somewhere :).
    * We can create topics, categories and tags. Topic can belong to one category and have many tags. 
    * We have CRUD for Topics and Categories. Only creating and deleting for tags.
    * On dasboard page, we have search bar which through Ajax search for a topics. It search typed phrase in name and description fields in the database. 
    * We have menu in navbar, where we can go to topics/categories/tags, and add or see them.


## Steps to run project on your local machine - install docker if you do not have it.

* Go to main folder WannabeGuide, on branch master, and in terminal type below commands : 
    * composer install
    * cp -a .env.example .env
    * ./vendor/bin/sail up
    * ./vendor/bin/sail artisan key:generate
    * npm install && npm run dev

    * this is "clicking" step : in your browser go to phpmyadmin : 127.0.0.1:9000 - credentials are only username, without password
        - username : root
        - when you are logged in, create new db with name : "wannabeguide"
    
    * And last two commands that we have to type in terminal : 

    * ./vendor/bin/sail artisan migrate --seed
    * ./vendor/bin/sail artisan serve

* Then in your browser go to 127.0.0.1:8000, you will see login form. By seeding db we have example admin user :

    * username: admin@example.com, password: password - use that credentals to login.

    * We have seeded some basic topics, categories, and tags for the start.

## What was practicing :
* factories
* seeders
* migrations
* enums
* feature tests
* relations : 
    * hasMany, belongsToMany, belongsTo, ManyToMany
* jquery, ajax
* logging errors
* form requests
* api routes

* plese check the code if you want to see more :) 


## We have 26 basic feature test, type below command to check if everything is fine.
* .vendor/bin/sail artisan test

## If you want to call to API endpoints, you have to generate Bearer token.
* Go to "127.0.0.1:8000/login" in postman 
    * In Header add key-value pair
        * Accept - application/json
    * In Body add key-value pairs
        * email - admin@example.com
        * password - password

    Then you will get a message, that user is logged in with bearer token and its ID. 
    Use this token in Auth section, with type of Bearer token.
    Without it calling to API endpoints will be unauthenticated.
    If somehow you will lost this key, hit below endpoint : 
    127.0.0.1:8000/logout
    Then repeat steps from hitting login endpoint. 


## API Routes - I have created for practice purpose some API routes : 

* In all request, in headers add key - value pairs :
    * Content-Type => application/json
    * Accept => application/json


### In case with topics : 

* GET - /api/topics - to get all topics

* POST - /api/topics/store - to store a new topic
    * in Body send raw JSON :
    {
    "name":"your topic name",
    "description":"your topic description",
    "category_id":category_id_which_exists_in_db,
    "user_id":your_user_id
    }     

* GET - /api/topic - to get topic by id  
    * in Body send raw JSON :
    {
    "id":id_of_existing_topic,
    }  

* PATCH - /api/topic/update - to update specific topic
    * in Body send raw JSON :
    {  
    "name":"updated_name",
    "description":"updated_description",
    "category_id":new_but_existing_category_id,
    "user_id":author_id_of_this_topic,
    "topic_id":topic_id
    }  

* DELETE - /api/topic/delete - to delete specific topic
    * in Body send raw JSON :
    {  
    "id":topic_id,
    "user_id":author_id_of_this_topic,
    } 

### In case with categories : 

* GET - /api/categories - to get all categories

* POST - /api/category - to add a new category
    * in Body send raw JSON :
    {  
    "name":"category_name",
    "user_id":your_user_id,
    }  

* GET - /api/category - to show specific category
    * in Body send raw JSON :
    {  
    "id":"existing_category_id"         
    }  

* DELETE - /api/category/delete - to delete specific category
    * in Body send raw JSON :
    {  
    "id":existing_category_id, 
    "user_id":author_id_of_this_category         
    }  

### Tags feature have no api routes. 

## Additional informations
* What packages have been used :
  * Authorization with laravel Breeze
  * Auth bearer token chec with laravel Sanctum
  * Dockerize with laravel Sail
  * CKE Editor in create/update topic pages : https://ckeditor.com/docs/ckeditor5/latest/index.html


