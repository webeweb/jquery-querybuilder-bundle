WBWJQueryQueryBuilderBundle
===========================

[![Build Status](https://travis-ci.org/webeweb/WBWJQueryQueryBuilderBundle.svg?branch=master)](https://travis-ci.org/webeweb/WBWJQueryQueryBuilderBundle) [![Coverage Status](https://coveralls.io/repos/github/webeweb/WBWJQueryQueryBuilderBundle/badge.svg?branch=master)](https://coveralls.io/github/webeweb/WBWJQueryQueryBuilderBundle?branch=master) [![Latest Stable Version](https://poser.pugx.org/webeweb/jquery-querybuilder-bundle/v/stable)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle) [![Latest Unstable Version](https://poser.pugx.org/webeweb/jquery-querybuilder-bundle/v/unstable)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle) [![License](https://poser.pugx.org/webeweb/jquery-querybuilder-bundle/license)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle) [![composer.lock](https://poser.pugx.org/webeweb/jquery-querybuilder-bundle/composerlock)](https://packagist.org/packages/webeweb/jquery-querybuilder-bundle) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/57a910cc-74d4-4727-8c89-2805241f4ee6/mini.png)](https://insight.sensiolabs.com/projects/57a910cc-74d4-4727-8c89-2805241f4ee6)

Integrate jQuery QueryBuilder with Symfony2

/!\ This package is currently in developpment /!\

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash

$ composer require webeweb/jquery-querybuilder "~1.0@dev"

```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php

	public function registerBundles() {
		$bundles = [
            // ...
            new WBW\Bundle\JQuery\QueryBuilderBundle\WBWJQueryQueryBuilderBundle(),
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

$ mkdir WBWJQueryQueryBuilderBundle
$ cd WBWJQueryQueryBuilderBundle
$ git clone git@github.com:webeweb/WBWJQueryQueryBuilderBundle.git .
$ composer install

```

Once all required libraries are installed then do:

```bash

$ vendor/bin/phpunit

```

---

## License

WBWJQueryQueryBuilderBundle is released under the LGPL License. See the bundled
[LICENSE](LICENSE) file for details.
