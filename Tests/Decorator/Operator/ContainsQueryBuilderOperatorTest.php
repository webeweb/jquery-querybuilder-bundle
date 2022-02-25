<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Operator;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator\ContainsQueryBuilderOperator;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * Contains QueryBuilder operator test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Operator
 */
class ContainsQueryBuilderOperatorTest extends AbstractTestCase {

    /**
     * Tests toSql()
     *
     * @return void
     */
    public function testToSql(): void {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setField("field");
        $rule->setType(QueryBuilderRule::TYPE_STRING);
        $rule->setValue("value");

        $obj = new ContainsQueryBuilderOperator();

        $this->assertEquals("field LIKE '%value%'", $obj->toSql($rule));
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new ContainsQueryBuilderOperator();

        $this->assertEquals(QueryBuilderOperatorInterface::OPERATOR_CONTAINS, $obj->getOperator());
    }
}
