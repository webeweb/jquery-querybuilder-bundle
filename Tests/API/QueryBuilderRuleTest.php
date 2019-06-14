<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API;

use Exception;
use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder rule test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 */
class QueryBuilderRuleTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new QueryBuilderRule();

        $this->assertNull($obj->getDecorator());
        $this->assertNull($obj->getField());
        $this->assertNull($obj->getId());
        $this->assertNull($obj->getInput());
        $this->assertNull($obj->getOperator());
        $this->assertNull($obj->getType());
        $this->assertNull($obj->getValue());
    }

    /**
     * Tests the setOperator() method.
     *
     * @return void
     */
    public function testSetOperator() {

        $obj = new QueryBuilderRule();

        $obj->setOperator(QueryBuilderRule::OPERATOR_BEGINS_WITH);
        $this->assertEquals(QueryBuilderRule::OPERATOR_BEGINS_WITH, $obj->getOperator());
    }

    /**
     * Tests the setOperator() method.
     *
     * @return void
     */
    public function testSetOperatorWithInvalidArgumentException() {

        $obj = new QueryBuilderRule();

        try {

            $obj->setOperator("operator");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The operator \"operator\" is invalid", $ex->getMessage());
        }
    }

    /**
     * Tests the setValue() method.
     *
     * @return void
     */
    public function testSetValue() {

        $obj = new QueryBuilderRule();

        $obj->setValue("value");
        $this->assertEquals("value", $obj->getValue());
    }
}
