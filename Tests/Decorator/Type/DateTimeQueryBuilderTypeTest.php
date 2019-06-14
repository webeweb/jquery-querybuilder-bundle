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
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type\DateTimeQueryBuilderType;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * DateTime QueryBuilder type test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Type
 */
class DateTimeQueryBuilderTypeTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new DateTimeQueryBuilderType();

        $this->assertEquals(QueryBuilderTypeInterface::TYPE_DATETIME, $obj->getType());
    }

    /**
     * Tests the toSQL() method.
     *
     * @return void
     */
    public function testToSQL() {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setValue("2019-06-14 18:00:00");

        $obj = new DateTimeQueryBuilderType();

        $this->assertEquals("2019-06-14 18:00:00", $obj->toSQL($rule));
    }

    /**
     * Tests the toSQL() method.
     *
     * @return void
     */
    public function testToSQLWithWrap() {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setValue("2019-06-14 18:00:00");

        $obj = new DateTimeQueryBuilderType();

        $this->assertEquals("'2019-06-14 18:00:00'", $obj->toSQL($rule, true));
    }
}
