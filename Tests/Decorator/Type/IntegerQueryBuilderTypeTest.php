<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Type;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type\IntegerQueryBuilderType;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * Integer QueryBuilder type test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Type
 */
class IntegerQueryBuilderTypeTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new IntegerQueryBuilderType();

        $this->assertEquals(QueryBuilderTypeInterface::TYPE_INTEGER, $obj->getType());
    }

    /**
     * Tests the toSQL() method.
     *
     * @return void
     */
    public function testToSQL() {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setValue(1);

        $obj = new IntegerQueryBuilderType();

        $this->assertEquals("1", $obj->toSQL($rule));
    }
}
