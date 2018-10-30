# Simple Stream wrapper for PHP 7.2+ based on PSR-7 & PSR-17

[![Build Status](https://api.travis-ci.com/sunrise-php/stream.svg?branch=master)](https://travis-ci.com/sunrise-php/stream)
[![CodeFactor](https://www.codefactor.io/repository/github/sunrise-php/stream/badge)](https://www.codefactor.io/repository/github/sunrise-php/stream)
[![Latest Stable Version](https://poser.pugx.org/sunrise/stream/v/stable)](https://packagist.org/packages/sunrise/stream)
[![Total Downloads](https://poser.pugx.org/sunrise/stream/downloads)](https://packagist.org/packages/sunrise/stream)
[![License](https://poser.pugx.org/sunrise/stream/license)](https://packagist.org/packages/sunrise/stream)

## Awards

[![SymfonyInsight](https://insight.symfony.com/projects/a6301a76-9b35-49a3-adb1-ebbf59f810f2/big.svg)](https://insight.symfony.com/projects/a6301a76-9b35-49a3-adb1-ebbf59f810f2)

## Installation

```
composer require sunrise/stream
```

## How to use?

```php
use Sunrise\Stream\Stream;
use Sunrise\Stream\StreamFactory;

$factory = new StreamFactory();

// creates a new stream from the given string
$stream = $factory->createStream('Hello, world!');

// creates a new stream from the given filename or URI
$stream = $factory->createStreamFromFile('http://php.net/', 'rb');

// creates a new stream from the given resource
$stream = $factory->createStreamFromResource(fopen(...));

// creates a new stream without a factory
$stream = new Stream(fopen(...));

// converts the stream to string without a magic
$stream->toString();

// closes the stream
$stream->close();
```

## Test run

```bash
php vendor/bin/phpunit
```

## Api documentation

https://phpdoc.fenric.ru/

## Useful links

https://www.php-fig.org/psr/psr-7/<br>
https://www.php-fig.org/psr/psr-17/
