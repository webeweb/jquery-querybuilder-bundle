<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Serializer;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Normalizer\QueryBuilderNormalizer;
use WBW\Bundle\JQuery\QueryBuilderBundle\Serializer\JsonDeserializer;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\TestFixtures;

/**
 * JSON deserializer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Serializer
 */
class JsonDeserializerTest extends AbstractTestCase {

    /**
     * Tests the deserializeQueryBuilderRule() method.
     *
     * @return void
     */
    public function testDeserializeQueryBuilderRule(): void {

        // Set a QueryBuilder filter set mock.
        $filterSet = $this->getMockBuilder(QueryBuilderFilterSetInterface::class)->getMock();

        $arg = TestFixtures::getRule();

        $res = JsonDeserializer::deserializeQueryBuilderRule($filterSet, $arg);
        $this->assertInstanceOf(QueryBuilderRuleInterface::class, $res);

        $this->assertEquals("age", $res->getId());
        $this->assertEquals("age", $res->getField());
        $this->assertEquals(QueryBuilderInputInterface::INPUT_NUMBER, $res->getInput());
        $this->assertEquals(QueryBuilderOperatorInterface::OPERATOR_GREATER, $res->getOperator());
        $this->assertEquals(QueryBuilderTypeInterface::TYPE_INTEGER, $res->getType());
        $this->assertEquals(21, $res->getValue());
    }

    /**
     * Tests the deserializeQueryBuilderRuleSet() method.
     *
     * @return void
     */
    public function testDeserializeQueryBuilderRuleSet(): void {

        // Set a QueryBuilder filter set mock.
        $filterSet = $this->getMockBuilder(QueryBuilderFilterSetInterface::class)->getMock();

        $arg = TestFixtures::getRules();

        $res = JsonDeserializer::deserializeQueryBuilderRuleSet($filterSet, $arg);
        $this->assertInstanceOf(QueryBuilderRuleSetInterface::class, $res);

        $this->assertEquals(QueryBuilderConditionInterface::CONDITION_OR, $res->getCondition());
        $this->assertCount(2, $res->getRules());
        $this->assertTrue($res->getValid());

        $this->assertInstanceOf(QueryBuilderRuleInterface::class, $res->getRules()[0]);

        $this->assertInstanceOf(QueryBuilderRuleSetInterface::class, $res->getRules()[1]);

        $this->assertCount(2, $res->getRules()[1]->getRules());

        $this->assertInstanceOf(QueryBuilderRuleInterface::class, $res->getRules()[1]->getRules()[0]);
        $this->assertInstanceOf(QueryBuilderRuleInterface::class, $res->getRules()[1]->getRules()[1]);
    }
}