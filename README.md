jquery-querybuilder-bundle
==========================

[![Build Status](https://travis-ci.org/webeweb/jquery-querybuilder-bundle.svg?branch=master)](https://travis-ci.org/webeweb/jquery-querybuilder-bundle) [![Coverage Status](https://coveralls.io/repos/github/webeweb/jquery-querybuilder-bundle/badge.svg?branch=master)](https://coveralls.io/github/webeweb/jquery-querybuilder-bundle?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webeweb/jquery-querybuilder-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webeweb/jquery-querybuilder-bundle/?branch=master) [![Latest Stable Version](https://poser.pugx.org/webeweb/jquery-querybuilder-bundle/v/stable)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle) [![Latest Unstable Version](https://poser.pugx.org/webeweb/jquery-querybuilder-bundle/v/unstable)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle) [![License](https://poser.pugx.org/webeweb/jquery-querybuilder-bundle/license)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle) [![composer.lock](https://poser.pugx.org/webeweb/jquery-querybuilder-bundle/composerlock)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle)

Integrate jQuery QueryBuilder with Symfony 2.

> IMPORTANT NOTICE: This package is still under development. Any changes will be
> done without prior notice to consumers of this package. Of course this code
> will become stable at a certain point, but for now, use at your own risk.

---

## Compatibility

[![PHP](https://img.shields.io/badge/PHP-%5E5.6%7C%5E7.0-blue.svg)](http://php.net) [![Symfony](https://img.shields.io/badge/Symfony-%5E2.6%7C%5E3.0-brightgreen.svg)](https://symfony.com)

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/jquery-querybuilder "~1.0@dev"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
	public function registerBundles() {
		$bundles = [
            // ...
            new WBW\Bundle\JQuery\QueryBuilderBundle\JQueryQueryBuilderBundle(),
        ];

		// ...

		return $bundles;
    }
```

Once the bundle is added then do:

```bash
$ php bin/console assets:install
```

---

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
$ mkdir jquery-querybuilder-bundle
$ cd jquery-querybuilder-bundle
$ git clone git@github.com:webeweb/jquery-querybuilder-bundle.git .
$ composer install
```

Once all required libraries are installed then do:

```bash
$ vendor/bin/phpunit
```

---

## License

jquery-querybuilder-bundle is released under the LGPL License. See the bundled
[LICENSE](LICENSE) file for details.
