# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/towoju5/kyc-form.svg?style=flat-square)](https://packagist.org/packages/towoju5/kyc-form)
[![Total Downloads](https://img.shields.io/packagist/dt/towoju5/kyc-form.svg?style=flat-square)](https://packagist.org/packages/towoju5/kyc-form)
![GitHub Actions](https://github.com/towoju5/kyc-form/actions/workflows/main.yml/badge.svg)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require towoju5/kyc-form
```

## Usage

```php
      php artisan vendor:publish --provider="Towoju\KycForm\KycFormServiceProvider"
      php  artisan migrate


      Route::get('/kyc/create', [KycVerificationController::class,  'create'])->name('kyc.create');
      Route::post('/kyc/store', [KycVerificationController::class,  'store'])->name('kyc.store');
      Route::group(['middleware' => config('kyc-form.middleware')], function () {
            Route::get('/kyc', [KycVerificationController::class, 'index'])->name('kyc.index');
            Route::post('/kyc/approve/{id}', [KycVerificationController::class, 'approve'])->name('kyc.approve');
            Route::delete('/kyc/reject/{id}', [KycVerificationController::class, 'reject'])->name('kyc.reject');
      });
```

### Testing

```bash
to setup middleware for routes. kindly go to config -> kyc-form.php
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email towojuads@gmail.com instead of using the issue tracker.

## Credits

-   [EMMANUEL TOWOJU](https://github.com/towoju5)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
