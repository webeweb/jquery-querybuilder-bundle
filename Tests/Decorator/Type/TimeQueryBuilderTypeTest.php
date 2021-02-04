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
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type\TimeQueryBuilderType;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * Time QueryBuilder type test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Type
 */
class TimeQueryBuilderTypeTest extends AbstractTestCase {

    /**
     * Tests the toSql() method.
     *
     * @return void
     */
    public function testToSQL(): void {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setValue("18:00:00");

        $obj = new TimeQueryBuilderType();

        $this->assertEquals("18:00:00", $obj->toSql($rule));
    }

    /**
     * Tests the toSql() method.
     *
     * @return void
     */
    public function testToSQLWithWrap(): void {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setValue("18:00:00");

        $obj = new TimeQueryBuilderType();

        $this->assertEquals("'18:00:00'", $obj->toSql($rule, true));
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new TimeQueryBuilderType();

        $this->assertEquals(QueryBuilderTypeInterface::TYPE_TIME, $obj->getType());
    }
}
