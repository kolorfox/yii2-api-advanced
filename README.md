<p align="center">
    <a href="https://github.com/navatech" target="_blank">
        <img src="https://avatars2.githubusercontent.com/u/46888216" height="100px">
    </a>
    <h1 align="center">Yii 2 Kolorfox basic</h1>
    <br>
</p>

This project contains `frontend`, `backend`, `console` & `api` module.

INSTALL
-------
```
composer create-project kolorfox/yii2-api-advanced project-folder
```

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
api
    config/              contains api configurations
    controllers/         contains Web controller classes
    models/              contains api-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
