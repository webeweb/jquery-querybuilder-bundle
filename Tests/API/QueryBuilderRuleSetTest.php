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
use UnexpectedValueException;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder rule set test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 */
class QueryBuilderRuleSetTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new QueryBuilderRuleSet();

        $this->assertNull($obj->getCondition());
        $this->assertNull($obj->getFilterSet());
        $this->assertEquals([], $obj->getRules());
        $this->assertFalse($obj->getValid());
    }

    /**
     * Tests the setCondition() method.
     *
     * @return void
     */
    public function testSetCondition() {

        $obj = new QueryBuilderRuleSet();

        $obj->setCondition(QueryBuilderRuleSet::CONDITION_AND);
        $this->assertEquals(QueryBuilderRuleSet::CONDITION_AND, $obj->getCondition());
    }

    /**
     * Tests the setCondition() method.
     *
     * @return void
     */
    public function testSetConditionWithUnexpectedValueException() {

        $obj = new QueryBuilderRuleSet();

        try {

            $obj->setCondition("condition");
        } catch (Exception $ex) {

            $this->assertInstanceOf(UnexpectedValueException::class, $ex);
            $this->assertEquals("The condition \"condition\" is invalid", $ex->getMessage());
        }
    }

    /**
     * Tests the setFilterSet() method.
     *
     * @return void
     */
    public function testSetFilterSet() {

        // Set a Filter set mock.
        $filterSet = $this->getMockBuilder(QueryBuilderFilterSetInterface::class)->getMock();

        $obj = new QueryBuilderRuleSet();

        $this->assertSame($filterSet, $obj->getFilterSet());
    }
}
