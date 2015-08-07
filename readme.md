# Datafinder-php

Basic SDK for [Data Finder API](https://datafinder.com/api/overview).

## Dependencies

PHP 5.2+

Guzzle HTTP Client

## Getting Started

### Install
composer require petermartinez/datafinder-php

### Initializing Datafinder

```php
require_once('vendor/autoload.php');
require_once('src/Datafinder/Datafinder.php');

$search = array();
	$search['d_first']  = "";
	$search['d_last']  = "";
	$search['d_zip'] = "";
	$search['d_fulladdr'] = "";
	$search['d_city']  = "";
	$search['d_state'] = "";
$dataFinder = new Datafinder\Datafinder("APIKEY");
$results = $dataFinder->contactAppend("email",$search);
echo "<pre>";
print_R($results);

```

## Examples

Please see `example.php` for more information.