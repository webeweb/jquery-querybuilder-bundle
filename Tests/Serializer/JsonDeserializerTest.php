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

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Serializer\JsonDeserializer;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * JSON deserializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Serializer
 */
class JsonDeserializerTest extends AbstractTestCase {

    /**
     * Test deserializeQueryBuilderRule()
     *
     * @return void
     */
    public function testDeserializeQueryBuilderRule(): void {

        $data = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeQueryBuilderRule.json");
        $json = json_decode($data, true);

        $res = JsonDeserializer::deserializeQueryBuilderRule($this->qbFilterSet, $json);
        $this->assertInstanceOf(QueryBuilderRuleInterface::class, $res);

        $this->assertEquals("age", $res->getId());
        $this->assertEquals("age", $res->getField());
        $this->assertEquals(QueryBuilderInputInterface::INPUT_NUMBER, $res->getInput());
        $this->assertEquals(QueryBuilderOperatorInterface::OPERATOR_GREATER, $res->getOperator());
        $this->assertEquals(QueryBuilderTypeInterface::TYPE_INTEGER, $res->getType());
        $this->assertEquals(21, $res->getValue());
    }

    /**
     * Test deserializeQueryBuilderRuleSet()
     *
     * @return void
     */
    public function testDeserializeQueryBuilderRuleSet(): void {

        $data = file_get_contents(__DIR__ . "/JsonDeserializerTest.testDeserializeQueryBuilderRuleSet.json");
        $json = json_decode($data, true);

        $res = JsonDeserializer::deserializeQueryBuilderRuleSet($this->qbFilterSet, $json);
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
