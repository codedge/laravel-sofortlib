# Laravel 5 Facade for the Sofortlib
This repository implements a simple [ServiceProvider](https://laravel.com/docs/master/providers)
that creates a singleton instance of the Sofortlib client easily accessible via a [Facade](https://laravel.com/docs/master/facades) in [Laravel 5](http://laravel.com).  
See [@SofortLib](https://github.com/sofort/sofortlib-php) for more information about the usage.

## Installation using [Composer](https://getcomposer.org/)
```sh
$ cd <YOUR LARAVEL PROJECT ROOT>
$ composer require codedge/laravel-sofortlib:"dev-master"
```

This adds the laravel-sofortlib package to your `composer.json` and downloads the project.

Next run   
`php artisan vendor:publish --provider="Codedge\Sofortlib\SofortlibServiceProvider" --tag=config`  
to publish the configuration file for the SOFORT API to `config/sofortlib.php`.  
  
**Note**: Open this file and enter your correct API credentials and other settings.

## Usage
To use the static interfaces (facades) you need to add the following lines to your `config/app.php`. The `[1]` is for
registering the service provider, the `[2]` are for specifying the facades:

```php
// config/app.php

return [

    //...
    
    'providers' => [
        // ...
        
        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Codedge\Sofortlib\SofortlibServiceProvider::class, // [1]
    ],
    
    // ...
    
    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        
        // ...
        
        'View' => Illuminate\Support\Facades\View::class,
        'Billcode' => Codedge\Sofortlib\BillcodeFacade::class, // [2]
        'BillcodeDetails' => Codedge\Sofortlib\BillcodeDetailsFacade::class, // [2]
        'Ideal' => Codedge\Sofortlib\IdealFacade::class, // [2]
        'IdealBanks' => Codedge\Sofortlib\IdealBanksFacade::class, // [2]
        'Paycode' => Codedge\Sofortlib\PaycodeFacade::class, // [2]
        'PaycodeDetails' => Codedge\Sofortlib\PaycodeDetailsFacade::class, // [2]
        'Sofortueberweisung' => Codedge\Sofortlib\SofortueberweisungFacade::class, // [2]
        'Refund' => Codedge\Sofortlib\RefundFacade::class, // [2]
        'TransactionData' => Codedge\Sofortlib\TransactionDataFacade::class, // [2]
    ],

]
```

Now you can use the facades in your application. 

## Basic examples

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

``