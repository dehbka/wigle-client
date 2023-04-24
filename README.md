# Wigle api client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dehbka/wigle-client.svg?style=flat-square)](https://packagist.org/packages/dehbka/wigle-client)

## Installation

You can install the package via composer:

```bash
composer require dehbka/wigle-client
```

## Usage

```php
use Dehbka\WigleClient\Contracts\Resources\Network\Enum\Encryption;
use Dehbka\WigleClient\Contracts\Resources\Network\Search\SearchRequest;
use Dehbka\WigleClient\Wigle;

$client = Wigle::client($key);

$response = $client->network()->search(
    new SearchRequest(
        onlyMine: true,
        encryption: Encryption::none
    )
);

var_dump($response);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
