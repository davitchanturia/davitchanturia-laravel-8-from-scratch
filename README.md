<h1>Laravel From Scratch</h1>

Welcome to the Laravel From Scratch web-application, it is a blog app where you can see the posts about different topics, they belong to many categories. you can share your opinion in each post using comment section.

<img src="public/images/readme/first.png"/>
<img src="public/images/readme/third.png"/>


## Table of Contents

* [Prerequisites](#req)
* [Getting Started](#gettingStarted)
* [Resources](#resources)


#
<h2 id="req">Prerequisites:</h2>

<table>
    <tr>
        <td>* </td>
        <td>Laravel 8</td>
    </tr>
    <tr>
        <td>* </td>
        <td>PHP 8.0.11</td>
    </tr>
    <tr>
        <td>* </td>
        <td>MySQL 8.0.26</td>
    </tr>
    <tr>
        <td>*</td>
        <td>npm 6.14.15</td>
    </tr>
    <tr>
        <td>* </td>
        <td>composer 2.1.9</td>
    </tr>
</table>

<h2 id="gettingStarted">Getting Started</h2>

1\. First of all you need to clone Laravel 8 from scratch repository from github:
```sh
git clone https://github.com/RedberryInternship/davitchanturia-laravel-8-from-scratch.git
```

2\. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3\. Now we need to set our env file. Go to the root of your project and execute this command.
```sh
cp .env.example .env
```


And now you should provide **.env** file all the necessary environment variables. All you need here is DB_CONNECTION :
```sh

DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=blog-user
DB_PASSWORD=blog123
```

4\. Now execute in the root of you project following:
```sh
  php artisan key:generate
```
Which generates auth key.

5\. Make MYSQL database user and connect to this projects, then you can execute the commands: 
```sh
  php artisan migrate
  php artisan db:seed
```

Here is my project's database visualisation:
<img src="public/images/readme/schema.png"/>

6\. You also need to make a storage link for the images with the command, mentioned below and change the FILESYSTEM_DRIVER to public in your .env file:
```sh
  php artisan storage:link
  FILESYSTEM_DRIVER=public
```
7\. in order to be able to use the admin panel you should register with the username mentioned in AppServiseProvider.php
