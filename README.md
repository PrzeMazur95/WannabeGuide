## Steps to run project 
* Run in console below commands
    * docker-compose up -d
    * npm install && npm watch dev && npm run
    * php artisan serve
* Then go to 127.0.0.1:8000 to see home page

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## What is done

### Authorization with laravel Breeze
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

