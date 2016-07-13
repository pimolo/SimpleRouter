# SimpleRouter

## Installation

```sh
$ composer require pimolo/simple-router
```

## Usage

```php
<?php

use Pimolo\SimpleRouter\DTO\Route;
use Symfony\Component\HttpFoundation\Request;

require_once 'vendor/autoload.php';

// Wrap the request with HttpFoundation
$request = Request::createFromGlobals();

$kernel = new Router();

// Defines routes

$home = (new Route('/home', ['GET'], function () {
    return 'Welcome to my app';
}
));

$login = (new Route('/login', ['GET', 'POST'], function () {
    return 'Please login';
}
));

// Handle the resource
echo $kernel->route($request, [$home, $login]);

```

And if you want to test it :

```sh
php -S localhost:8000 main.php
```

