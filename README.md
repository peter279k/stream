# :shower: Sunrise Stream

[![Build Status](https://api.travis-ci.com/sunrise-php/stream.svg?branch=master)](https://travis-ci.com/sunrise-php/stream)
[![CodeFactor](https://www.codefactor.io/repository/github/sunrise-php/stream/badge)](https://www.codefactor.io/repository/github/sunrise-php/stream)
[![Latest Stable Version](https://poser.pugx.org/sunrise/stream/v/stable)](https://packagist.org/packages/sunrise/stream)
[![Total Downloads](https://poser.pugx.org/sunrise/stream/downloads)](https://packagist.org/packages/sunrise/stream)
[![License](https://poser.pugx.org/sunrise/stream/license)](https://packagist.org/packages/sunrise/stream)

## Installation

```
composer require sunrise/stream
```

## How to use

```php
use Sunrise\Stream\Stream;

$handle = \fopen('http://php.net/', 'rb');

$stream = new Stream($handle);

var_dump($stream->toString());

$stream->close();
```

## Api documentation

https://phpdoc.fenric.ru/