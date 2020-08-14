About Application
=====

Laravel crud application without using any database. Use Csv instead for storing data.

Features Completed
-------

* Front end and Back end validation
* Company List
* Pagination
* Company Detail (developing)

System Requirements
-------

PHP >= 7.0.10 but the latest version of PHP is recommended.

Third Party Libraries Used
-------

* Larevel 7.x as framework
* league/csv to Read and Write to CSV documents 
* jenssegers/model to create Laravel eloquent-like model but not use database to store.
* Bootstrap

Install
-------

* Clone the repository
* Run `composer install` in the project folder
* Run `npm install` in the project folder
* Create a .env file and generate APP_KEY by command `php artisan key:generate`

Run Application
-------

* Final step run this command `php artisan serve` and go to URL: http://localhost:8000/company
