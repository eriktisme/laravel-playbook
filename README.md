# Laravel Playbook

[![Latest Version on Packagist](https://img.shields.io/packagist/v/scaling/laravel-playbook.svg?style=flat-square)](https://packagist.org/packages/scaling/laravel-playbook)
[![Build Status](https://img.shields.io/travis/teamscaling/laravel-playbook/master.svg?style=flat-square)](https://travis-ci.org/teamscaling/laravel-playbook)
[![Quality Score](https://img.shields.io/scrutinizer/g/teamscaling/laravel-playbook.svg?style=flat-square)](https://scrutinizer-ci.com/g/teamscaling/laravel-playbook)
[![Codecov](https://codecov.io/gh/teamscaling/laravel-playbook/branch/master/graph/badge.svg)](https://codecov.io/gh/teamscaling/laravel-playbook)
[![Total Downloads](https://img.shields.io/packagist/dt/scaling/laravel-playbook.svg?style=flat-square)](https://packagist.org/packages/scaling/laravel-playbook)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require scaling/laravel-playbook
```

You can publish the configurations with:
```bash
php artisan vendor:publish --provider="Scaling\Paybook\PlaybookServiceProvider" --tag="config"
```

## Usage

### Running a predefined playbook
``` bash
php artisan playbook:run {playbook?}
```
*Note:* incase you don't specify a playbook you will be prompted with a choice.

### Creating a playbook
``` bash
php artisan make:playbook Foo
```
*Note: the command will automatically add a suffix.*

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email erik@scaling.studio instead of using the issue tracker.

## Credits

- [Erik](https://github.com/eriktisme)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
