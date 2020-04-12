# Laravel integration for Sofortlib
This repository implements a simple [ServiceProvider](https://laravel.com/docs/master/providers)
that creates a singleton instance of the Sofortlib client easily accessible via a [Facade](https://laravel.com/docs/master/facades).  

See [SofortLib](https://github.com/sofort/sofortlib-php) for more information about the usage.

## Installation
```sh
$ composer require codedge/laravel-sofortlib
```

The package registers itself.

Next run   
`php artisan vendor:publish --provider="Codedge\Sofortlib\SofortlibServiceProvider" --tag=config`  
to publish the configuration file for the SOFORT API to `config/sofortlib.php`.  
  
**Note**: Open this file and enter your correct API credentials and other settings.

## Usage
To use the static interfaces (facades) you need to add the following lines to your `config/app.php`. 

### Sofortüberweisung

```php
// app/Http/routes.php

Route::get('/', function () {

    Sofortueberweisung::setAmount(5);
    Sofortueberweisung::setCurrencyCode('EUR');
    Sofortueberweisung::sendRequest();

    if(Sofortueberweisung::isError()) {
        // do something...
    }

});
```

### Billcode

```php
// app/Http/routes.php

Route::get('/', function () {

    Billcode::setAmount(47.11);
    Billcode::setCurrencyCode('USD');
    Billcode::createBillcode();

    if(Billcode::isError()) {
        // do something...
    }

});
```
