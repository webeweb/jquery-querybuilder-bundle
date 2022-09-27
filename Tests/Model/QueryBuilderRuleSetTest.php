<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model;

use Exception;
use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderRuleSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder rule set test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model
 */
class QueryBuilderRuleSetTest extends AbstractTestCase {

    /**
     * Tests setCondition()
     *
     * @return void
     */
    public function testSetCondition(): void {

        $obj = new QueryBuilderRuleSet();

        $obj->setCondition(QueryBuilderConditionInterface::CONDITION_AND);
        $this->assertEquals(QueryBuilderConditionInterface::CONDITION_AND, $obj->getCondition());
    }

    /**
     * Tests setCondition()
     *
     * @return void
     */
    public function testSetConditionWithInvalidArgumentException(): void {

        $obj = new QueryBuilderRuleSet();

        try {

            $obj->setCondition("condition");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The condition "condition" is invalid', $ex->getMessage());
        }
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new QueryBuilderRuleSet();

        $this->assertInstanceOf(QueryBuilderRuleSetInterface::class, $obj);

        $this->assertNull($obj->getCondition());
        $this->assertEquals([], $obj->getRules());
        $this->assertFalse($obj->getValid());
    }
}
