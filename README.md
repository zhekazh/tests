Ardas test Application
========================

Requirements
------------

  * PHP 7.2.9 or higher;
  * MYSQL 5.7 or higher;
  * And the [usual Symfony application requirements][1].
  * Database config:
  *  - database name:test
  *  - database user:root
  *  - database password:password
  * or edit .env
  
Installation
------------

```bash
$ composer install
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:create
$ php bin/console doctrine:fixtures:load
```

Usage
-----

There's no need to configure anything to run the application. If you have
[installed Symfony][2], run this command and access the application in your
browser at the given URL (<https://localhost:8000> by default):

```bash
$ cd my_project/
$ symfony serve
```

If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
to use the built-in PHP web server or [configure a web server][3] like Nginx or
Apache to run the application.

[1]: https://symfony.com/doc/current/reference/requirements.html
[2]: https://symfony.com/download
[3]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
