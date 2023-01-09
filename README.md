jquery-querybuilder-bundle
==========================

[![Build Status](https://img.shields.io/github/actions/workflow/status/webeweb/jquery-querybuilder-bundle/build.yml?style=flat-square)](https://github.com/webeweb/jquery-querybuilder-bundle/actions)
[![Coverage Status](https://img.shields.io/coveralls/webeweb/jquery-querybuilder-bundle/master.svg?style=flat-square)](https://coveralls.io/github/webeweb/jquery-querybuilder-bundle?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/quality/g/webeweb/jquery-querybuilder-bundle/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/webeweb/jquery-querybuilder-bundle/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/webeweb/jquery-querybuilder-bundle.svg?style=flat-square)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle)
[![License](https://img.shields.io/packagist/l/webeweb/jquery-querybuilder-bundle.svg?style=flat-square)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle)
[![composer.lock](https://img.shields.io/badge/.lock-uncommited-important.svg?style=flat-square)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle)

Integrate jQuery QueryBuilder with Symfony 2 and more.

`jquery-querybuilder-bundle` eases the use of jQuery QueryBuilder in your
Symfony application by providing Twig extensions and PHP objects to do the
heavy lifting. The bundle include the excellent JS library
[jQuery QueryBuilder](https://querybuilder.js.org/).

Dry out your jQuery QueryBuilder code by writing it all in PHP !

> IMPORTANT NOTICE: This package is still under development. Any changes will be
> done without prior notice to consumers of this package. Of course this code
> will become stable at a certain point, but for now, use at your own risk.

Includes:

- [interactjs 1.3.3](http://interactjs.io) (jQuery QueryBuilder dependency)
- [jQuery QueryBuilder 2.6.2](https://querybuilder.js.org)

If you like this package, pay me a beer (or a coffee)
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-0070ba.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

## Compatibility

[![PHP](https://img.shields.io/packagist/php-v/webeweb/jquery-querybuilder-bundle.svg?style=flat-square)](http://php.net)
[![Symfony](https://img.shields.io/badge/symfony-%5E4.4%7C%5E5.0-brightness.svg?style=flat-square)](https://symfony.com)

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/jquery-querybuilder
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
    public function registerBundles() {
        $bundles = [
            // ...
            new WBW\Bundle\CoreBundle\WBWCoreBundle(),
            new WBW\Bundle\JQuery\QueryBuilderBundle\WBWJQueryQueryBuilderBundle(),
        ];

        // ...

        return $bundles;
    }
```

Once the bundle is added then do:

```bash
$ php bin/console assets:install
$ php bin/console wbw:core:unzip-assets
```

## Usage

Read the [documentation](Resources/doc/index.md).

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
$ git clone https://github.com/webeweb/jquery-querybuilder-bundle.git
$ cd jquery-querybuilder-bundle
$ composer install
```

Once all required libraries are installed then do:

```bash
$ vendor/bin/phpunit
```

## License

`jquery-querybuilder-bundle` is released under the MIT License. See the bundled
[LICENSE](LICENSE) file for details.

## Donate

If you like this work, please consider donating at
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-0070ba.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)
