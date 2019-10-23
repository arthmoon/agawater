Island experiment backend for admins project
============================================
> If you want to take over the project and develop it further, let a.mun@studionx.ru know and you'll be granted permissions required.

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
api
    config/              contains backend configurations
    controllers/         contains Web controller classes
    modules/             contains api-specific modules
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    web/                 contains the entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 7.2 >, MySQL Persona Server 5.1


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
hg clone http://repos.i/hg/socexp_support_backend
composer global require "fxp/composer-asset-plugin:~1.1.1"
cd socexp_support_backend
composer install
mkdir -p api/runtime api/web/assets console/runtime
chgrp www-data api/runtime api/web/assets console/runtime
~~~

GETTING STARTED
---------------

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Configure database and adjust the `components['socexp']` configuration in `common/config/main-local.php` accordingly.
4. Apply migrations with console command `php yii migrate/up`. This will create tables needed for the application to work.
5. Set document roots of your Web server:

- for api `/path/to/app/api/web/` and using the URL `http://api.domain/`