## Steps to run project 
* Run in console below commands
    * docker-compose up -d
    * npm install && npm watch dev && npm run dev
    * php artisan serve
    * type in terminal :
        * "php artisan make:migrate" - to create tables
        * type in terminal "php artisan db:seed"
            ** you will have admin user with credentials : 
             *** username: admin@example.com, password: password
            ** also with some fake topics an categories at the beggining
* Then go to 127.0.0.1:8000 to see home page


## What is done

### Authorization with laravel Breeze
### Used CKE Editor in create/update topic : https://ckeditor.com/docs/ckeditor5/latest/index.html
### Topic model, migration, Api/Web controller, factory
### api and web routes are grouped by its controller

### Api
 * All topics
    * route to see all topics
    * view page to render all topics
    * route to edit specific topic
    * route to delete specific topic
    * route to create new topic
    * all requests has their own validation

* Overall
    * Rest responses, and any messages are stored as enums, so they will be the same allways.

 ### Web
 * All topics
    * route to see all topics
    * view page to render all topics
    * crud for topics
    * all routes has their own validation
    * if name exists in db, or it is some any other error, it will be show on page
    * show flash pop up, when new topic has been added
    * form data stays when added topic has the same name which is an error


 ### In progress
 * new topic
    * added log info only in store api topic controller - done
    * update update method in web controller, log, cache msg - done
    * grab all mathods in try catch block - in web done, now api - done
    * need to do tests to it, for web and for api, check if new topic exists, and pop-up is shown
    * set that api request shuld have accept json, and content type the same
    * all displayed tasks on all task grid are hrefs, create a form to show topic modal - done
    * after click, modal page of specific post shuld be displayed - done

* category model

    


_____

## To do 
 * CRUD for tasks - done in web - now api
 * add option to add photos to specific topic
 * refactor web and api controller - try catch block, to not be dry - some parent method
 * check in api if user exisits, and if topic is his own
 * categories, an relations between them and tasks
 * create a middleware for api, to protect from unauthorized requests
 * docker file
 * add new container to phpunit purpose
 * postman documentation
 * add log inforations in controllers - more specific log messages
 * create prefixes to logger like -web, api, in enums, instead of two the same enum files for each one
 * add dusk test cases for act like a user
 * add user factory, to have an admin on the begginign
 * edit update topic, add there choose new category
 * tag model doess not have any api methods

