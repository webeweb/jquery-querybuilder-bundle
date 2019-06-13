<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Normalizer;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderValidation;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderValidationInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Normalizer\QueryBuilderNormalizer;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\TestFixtures;

/**
 * QueryBuilder normalizer test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Normalizer
 */
class QueryBuilderNormalizerTest extends AbstractTestCase {

    /**
     * Tests the denormalizeQueryBuilderRuel() method.
     *
     * @return void
     */
    public function testDenormalizeQueryBuilderRule() {

        $arg = TestFixtures::getRule();

        $res = QueryBuilderNormalizer::denormalizeQueryBuilderRule($arg);
        $this->assertInstanceOf(QueryBuilderRuleInterface::class, $res);

        $this->assertEquals("age", $res->getId());
        $this->assertEquals("age", $res->getField());
        $this->assertEquals(QueryBuilderInputInterface::INPUT_NUMBER, $res->getInput());
        $this->assertEquals(QueryBuilderOperatorInterface::OPERATOR_GREATER, $res->getOperator());
        $this->assertEquals(QueryBuilderTypeInterface::TYPE_INTEGER, $res->getType());
        $this->assertEquals(21, $res->getValue());
    }

    /**
     * Tests the denormalizeQueryBuilderRuleSet() method.
     *
     * @return void
     */
    public function testDenormalizeQueryBuilderRuleSet() {

        $arg = TestFixtures::getRules();

        $res = QueryBuilderNormalizer::denormalizeQueryBuilderRuleSet($arg);
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

    /**
     * Tests the normalizeQueryBuilderFilter() method.
     *
     * @return void
     */
    public function testNormalizeQueryBuilderFilter() {

        // Set a QueryBuilder validation mock.
        $validation = $this->getMockBuilder(QueryBuilderValidationInterface::class)->getMock();
        $validation->expects($this->any())->method("jsonSerialize")->willReturn([]);

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_STRING, [QueryBuilderFilter::OPERATOR_EQUAL]);
        $obj->setField("field");
        $obj->setInput(QueryBuilderFilter::INPUT_NUMBER);
        $obj->setLabel("label");
        $obj->setMultiple(true);
        $obj->setValidation($validation);
        $obj->setValues(["values"]);

        $res = [
            "id"         => "id",
            "field"      => "field",
            "label"      => "label",
            "type"       => "string",
            "input"      => "number",
            "values"     => ["values"],
            "multiple"   => true,
            "validation" => [],
            "operators"  => ["equal"],
        ];

        $this->assertEquals($res, QueryBuilderNormalizer::normalizeQueryBuilderFilter($obj));
    }

    /**
     * Tests the normalizeQueryBuilderSet() method.
     *
     * @return void
     */
    public function testNormalizeQueryBuilderFilterSet() {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();

        $obj->addFilter($filter);
        $res = [
            [
                "id"        => "id",
                "label"     => "",
                "type"      => QueryBuilderFilter::TYPE_INTEGER,
                "operators" => [
                    QueryBuilderFilter::OPERATOR_EQUAL,
                ],
            ],
        ];
        $this->assertEquals($res, QueryBuilderNormalizer::normalizeQueryBuilderFilterSet($obj));
    }

    /**
     * Tests the normalizeQueryBuilderValidation() method.
     *
     * @return void
     */
    public function testNormalizeQueryBuilderValidation() {

        $obj = new QueryBuilderValidation();
        $obj->setAllowEmptyValue(true);
        $obj->setCallback("callback");
        $obj->setFormat("format");
        $obj->setMax("max");
        $obj->setMessages([]);
        $obj->setMin("min");
        $obj->setStep(0);

        $res = [
            "format"            => "format",
            "min"               => "min",
            "max"               => "max",
            "step"              => 0,
            "messages"          => [],
            "allow_empty_value" => true,
            "callback"          => "callback",
        ];
        $this->assertEquals($res, QueryBuilderNormalizer::normalizeQueryBuilderValidation($obj));
    }
}
