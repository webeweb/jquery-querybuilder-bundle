<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\Decorator;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorFactory;

/**
 * Test QueryBuilder decorator factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\Decorator
 */
class TestQueryBuilderDecoratorFactory extends QueryBuilderDecoratorFactory {

    /**
     * {@inheritdoc}
     */
    public static function enumQueryBuilderOperators(): array {
        return parent::enumQueryBuilderOperators();
    }

    /**
     * {@inheritdoc}
     */
    public static function enumQueryBuilderTypes(): array {
        return parent::enumQueryBuilderTypes();
    }

    /**
     * {@inheritdoc}
     */
    public static function newQueryBuilderDecorator(array $enum, string $key): ?QueryBuilderDecoratorInterface {
        return parent::newQueryBuilderDecorator($enum, $key);
    }
}
