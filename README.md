Iso8601 Validator
============

Install via Composer
-------

You may install this package by issuing the Composer in your terminal:

```bash
composer require "wojciechmruk/iso8610datevalidator"
```

## Register new rules

Update **app\Providers\AppServiceProvider.php** by adding following lines into boot method.

```php
Validator::extend('iso_date', 'WojciechMruk\LaravelValidator\Iso8610DateValidator@validate');
Validator::extend('date_not_before', 'WojciechMruk\LaravelValidator\DateRangeValidator@notFromThePast');
Validator::extend('date_before', 'WojciechMruk\LaravelValidator\DateRangeValidator@fromThePast');
Validator::extend('date_not_after', 'WojciechMruk\LaravelValidator\DateRangeValidator@notFromTheFuture');
Validator::extend('date_after', 'WojciechMruk\LaravelValidator\DateRangeValidator@fromTheFuture');
```

## Defining The Error Message

You will also need to define an error message for your custom rule. 

Edit: **resources\lang\en\validation.php**

Add this to the array:

```php
    'date_iso'              => 'Provided date should be in ISO 8601 format.',
    'date_not_before'       => 'Provided date can not be the past date.',
    'date_before'           => 'Provided date must be the past date.',
    'date_not_after'        => 'Provided date can not be the future date.',
    'date_after'            => 'Provided date must be the future date.',

```

## Basic Usage

* check iso

```php
 $this->validate($request, [
        'date' => 'required|date_iso',
    ]);
```

* check not before date

```php
 $this->validate($request, [
        'date' => 'required|date_not_before',
    ]);
```

* check before date

```php
 $this->validate($request, [
        'date' => 'required|date_before',
    ]);
```


* check not future date

```php
 $this->validate($request, [
        'date' => 'required|date_not_after',
    ]);
```

* check future date

```php
 $this->validate($request, [
        'date' => 'required|date_after',
    ]);
```