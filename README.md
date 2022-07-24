# Thingamabob Widget Manager

[![run-tests](https://github.com/humweb/thingamabob/actions/workflows/run-tests.yml/badge.svg)](https://github.com/humweb/thingamabob/actions/workflows/run-tests.yml)
[![PHPStan](https://github.com/humweb/thingamabob/actions/workflows/phpstan.yml/badge.svg)](https://github.com/humweb/thingamabob/actions/workflows/phpstan.yml)
[![Check & fix styling](https://github.com/humweb/thingamabob/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/humweb/thingamabob/actions/workflows/php-cs-fixer.yml)



## Installation

You can install the package via composer:

```bash
composer require humweb/thingamabob
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="thingamabob-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="thingamabob-config"
```

This is the contents of the published config file:

```php
return [
    'route' => '/api/widgets',
    'middleware' => [],
    'assets_path' => resource_path('js/widgets/'),
];
```

## Usage

#### Register new widget
```php
Widgets::resgister('stats', new StatsWiget());
```
<br>

#### Writing a widget
```php
class UserWidget extends AbstractWidget implements Widget
{
    public string $title = 'Users';
    public string $component = 'UserWidget';

    public function data(Request $request): Collection
    {
       return User::take(5)->get();
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ryun](https://github.com/humweb)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
