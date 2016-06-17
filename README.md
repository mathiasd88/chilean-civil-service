## Laravel Chilean Civil Service

A Chilean Civil Service interface to find people by rut.

**This project is still on development mode.**

## Installation

Require this package with composer:

```
composer require mathiasd88/chilean-civil-service
```

After updating composer, add the ServiceProvider to the providers array in config/app.php

### Laravel 5.x:

```
Mathiasd88\ChileanCivilService\CivilServiceServiceProvider::class,
```

If you want to use the facade, add this to your facades in app.php:

```
'Procedure' => Mathiasd88\ChileanCivilService\Facades\CivilService::class,
```
