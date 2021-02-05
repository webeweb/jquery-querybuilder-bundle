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
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type\BooleanQueryBuilderType;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * Boolean QueryBuilder type test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Type
 */
class BooleanQueryBuilderTypeTest extends AbstractTestCase {

    /**
     * Tests the toSql() method.
     *
     * @return void
     */
    public function testToSql(): void {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setValue(true);

        $obj = new BooleanQueryBuilderType();

        $this->assertEquals("1", $obj->toSql($rule));
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new BooleanQueryBuilderType();

        $this->assertEquals(QueryBuilderTypeInterface::TYPE_BOOLEAN, $obj->getType());
    }
}
