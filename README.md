<h1 align="center">Laravel 5 Push Urls To Search Engine</h1>

<p align="center">NOW, Only Support baidu.</p>


## Features

- Support actions:
    - Sogou
    - 360
    - Google

## Installation

### Required

- PHP 7.0 +
- Laravel 5.5 +

You can install the package using composer

```sh
$ composer require composer require momosc/push-urls
```

Then add the service provider to `config/app.php`

```php
Momosc\LaravelPushUrls\PushUrlsServiceProvider::class
```

Publish the migrations file:

```sh
$ php artisan vendor:publish --provider='Momosc\LaravelPushUrls\PushUrlsServiceProvider::class' --tag="migrations"
```

As optional if you want to modify the default configuration, you can publish the configuration file:
 
```sh
$ php artisan vendor:publish --provider='Momosc\LaravelPushUrls\PushUrlsServiceProvider::class' --tag="config"
```

And create tables:

```php
$ php artisan migrate
```

## Usage

```php
use Momosc\LaravelPushUrls\PushUrlsServiceProvider;

class News
{
    use BaiduTrait;
    public function index()
    {
        $urls = ['http://www.***.com'];
        $this->pushUrls($urls);
    }
}
```

## License

MIT
