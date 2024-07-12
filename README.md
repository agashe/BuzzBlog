# BuzzBlog

A simple blog written using Yii framework and Mysql.

## Features

* User authentication processes, such as login and register
* User can create , update and delete posts
* User can add , update and delete comments on posts
* User can give like to posts
* USer can search and filter posts by title , author and date

## Requirements

* PHP (>=8.0)
* Mysql (>=8.0)

## Database Configuration

In order to run the migrations and seeders , one single SQL file all necessary statements , in your terminal run the following command :

```
mysql -u root -p buzzblog < protected/data/schema.mysql.sql 
```

Where `root` is the name of the database user and `buzzblog` is the name of the database you created for the project !

Then we add our database credentials to the main config file , in your editor of choice , open the following file `protected/config/main.php` and update the following lines :

```
'db'=>array(
    'connectionString' => 'mysql:host=localhost;dbname=my_database_name',
    'emulatePrepare' => true,
    'username' => 'my_database_username',
    'password' => 'my_database_password',
    'charset' => 'utf8',
    'tablePrefix' => 'tbl_',
),
```
## Running the application

In case you have Apache server already installed on your machine , put the project directory in the Apache serve public directory (e.g `html`) , then create a new `.htaccess` file in the root of the project , and add the following lines to it :

```
RewriteEngine on

# prevent httpd from serving dotfiles (.htaccess, .svn, .git, etc.)
RedirectMatch 403 /\..*$
# if a directory or a file exists, use it directly
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
# otherwise forward it to index.php
RewriteRule . index.php
```
For Nginx configuration check this link :  [Apache and Nginx configurations](https://www.yiiframework.com/doc/guide/1.1/en/quickstart.apache-nginx-config)


Another way to run the application is to use the PHP built in server , by simply running the following command in your terminal :

```
php -S localhost:8080
```

Now visit http://localhost:8080/ in your browser.

## License

(BuzzBlog) released under the terms of the MIT license.