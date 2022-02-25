<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Serializer;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderValidationInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilterSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderValidation;
use WBW\Bundle\JQuery\QueryBuilderBundle\Serializer\JsonSerializer;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder serializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Serializer
 */
class JsonSerializerTest extends AbstractTestCase {

    /**
     * Tests serializeQueryBuilderFilter()
     *
     * @return void
     */
    public function testSerializeQueryBuilderFilter(): void {

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

        $this->assertEquals($res, JsonSerializer::serializeQueryBuilderFilter($obj));
    }

    /**
     * Tests serializeQueryBuilderSet()
     *
     * @return void
     */
    public function testSerializeQueryBuilderFilterSet(): void {

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
        $this->assertEquals($res, JsonSerializer::serializeQueryBuilderFilterSet($obj));
    }

    /**
     * Tests serializeQueryBuilderValidation()
     *
     * @return void
     */
    public function testSerializeQueryBuilderValidation(): void {

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
        $this->assertEquals($res, JsonSerializer::serializeQueryBuilderValidation($obj));
    }
}
