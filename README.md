<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Requirements

	PHP 8.1.x / 8.2.x
    Laravel 10.x.x
    Composer 2.x.x
    Terminal CMD / PowerShell / GitBash
    Code Editor Sublime Text / VS Code / Notepad++

## Installation Guide

1. Install XAMPP [`Download XAMPP`](https://www.apachefriends.org/download.html)

2. Install Code Editor [`Download Notepad++`](https://notepad-plus-plus.org/downloads/) [`Download Sublime Text`](https://www.sublimetext.com/download) [`Download VS Code`](https://code.visualstudio.com/download)

3. Install GIT [`Download GIT`](https://git-scm.com/download/)

4. Install Composer [`Download Composer`](https://getcomposer.org/download/)

5. Clone the repo

```
git clone https://github.com/FitrahXSenpai/laravel10-app.git
```

after the clone process is complete open `file explorer` create a `new folder` anywhere, I create it in the D: directory with the folder name `Applications` and move the `laravel10-app` that we have cloned into that folder, and you do cd into the `Applications folder` then enter into the `laravel10-app`

```
cd D:
```

```
cd .\Applications\laravel10-app
```

```
composer install
```

6. Install Laravel Globally via Composer [`Documentation`](https://laravel.com/docs/10.x/installation#your-first-laravel-project)

```
composer global require laravel/installer
```

Laravel Global configuration Composer system-wide Vendor Bin directory in Windows $PATH : `Go to System` -> `Advanced System Settings` -> `Environment Variables` -> `in User Variables select Path then click Edit` -> `Click New Then Enter Command %USERPROFILE%\AppData\Roaming\Composer\vendor\bin`

7. Install Eloquent-Sluggable via Composer [`Documentation`](https://github.com/cviebrock/eloquent-sluggable)

```
composer require cviebrock/eloquent-sluggable
```

8. Install Valet via Composer

Install Valet versi MacOS [`Documentation`](https://laravel.com/docs/10.x/valet#installation)

Install Valet versi Windows [`Documentation`](https://packagist.org/packages/cretueusebiu/valet-windows)

```
composer global require cretueusebiu/valet-windows
```

```
valet install
```

go up one folder using the command

```
cd ..
```

then type the command

```
valet park
```

This will registers a directory on your machine that contains your applications. Once the directory has been `parked` with Valet, all of the directories within that directory will be accessible in your web browser at http://directory-name.test. So, if your parked directory contains a directory named "laravel10-app", the application within that directory will be accessible at http://laravel10-app.test.

If you're installing on Windows 10/11, you may need to [`manually configure`](https://mayakron.altervista.org/support/acrylic/Windows10Configuration.htm) Windows to use the Acrylic DNS proxy.

If you install Valet so that it runs smoothly in the future because velet uses port 80 where the port is also used by XAMPP, then we have to change the port on XAMPP so that it doesn't clash with each other : `open the XAMPP application` -> `click config on the apache module then select the Apache "httpd.conf"` -> `then look for the word Listen 80 then change to Listen 8080 and look for the word ServerName localhost:80 and change to ServerName localhost:8080` -> `if so don't forget to save and close -> if we want to use XAMPP then we no longer call localhost/ but localhost:8080`

## How to Setting 

1. Rename or Copy `.env.example` file to `.env`
Go into .env file change Name Database, APP URL, Faker Locale, and File System Disk. Then setup some configuration with your own credentials
```
APP_URL=http://laravel10-app.test/
    
DB_DATABASE=laravel10
        
FAKER_LOCALE=id_ID
FILESYSTEM_DISK=public
```

2. Run the Migration with Seeder

```
cd laravel10-app
```

```
php artisan migrate:fresh --seed
```

3. Generate a New Application Key

```
php artisan key:generate
```

4. Create a Symbolic Link Laravel File Manager

```
php artisan storage:link
```

Thank You so much for your time !!!

### Screenshots :

![https://ibb.co/PDWb1PZ](https://i.ibb.co/hYdn24R/1.png)

![https://ibb.co/p26KDzS](https://i.ibb.co/BLH6DZ9/2.png)

![https://ibb.co/1z3N33M](https://i.ibb.co/FH9199X/3.png)

![https://ibb.co/fFfwJdF](https://i.ibb.co/JtVJZjt/4.png)