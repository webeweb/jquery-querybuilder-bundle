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
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type\StringQueryBuilderType;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * String QueryBuilder type test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Type
 */
class StringQueryBuilderTypeTest extends AbstractTestCase {

    /**
     * Tests the toSQL() method.
     *
     * @return void
     */
    public function testToSQL() {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setValue("string");

        $obj = new StringQueryBuilderType();

        $this->assertEquals("string", $obj->toSQL($rule));
    }

    /**
     * Tests the toSQL() method.
     *
     * @return void
     */
    public function testToSQLWithWrap() {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setValue("string");

        $obj = new StringQueryBuilderType();

        $this->assertEquals("'string'", $obj->toSQL($rule, true));
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $obj = new StringQueryBuilderType();

        $this->assertEquals(QueryBuilderTypeInterface::TYPE_STRING, $obj->getType());
    }
}
