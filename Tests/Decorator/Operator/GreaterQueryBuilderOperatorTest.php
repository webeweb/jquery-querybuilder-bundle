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

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator\GreaterQueryBuilderOperator;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * Greater QueryBuilder operator test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator\Operator
 */
class GreaterQueryBuilderOperatorTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new GreaterQueryBuilderOperator();

        $this->assertEquals(QueryBuilderOperatorInterface::OPERATOR_GREATER, $obj->getOperator());
    }

    /**
     * Tests the toSQL() method.
     *
     * @return void
     */
    public function testToSQL() {

        // Set a QueryBuilder rule mock.
        $rule = new QueryBuilderRule();
        $rule->setField("field");
        $rule->setType(QueryBuilderRule::TYPE_STRING);
        $rule->setValue("value");

        $obj = new GreaterQueryBuilderOperator();

        $this->assertEquals("field > 'value'", $obj->toSQL($rule));
    }
}
