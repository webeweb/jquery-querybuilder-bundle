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

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilterSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderValidation;
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

        // Set the QueryBuilder validation mock.
        $this->qbValidation->expects($this->any())->method("jsonSerialize")->willReturn([]);

        $data = file_get_contents(__DIR__ . "/JsonSerializerTest.testSerializeQueryBuilderFilter.json");
        $json = json_decode($data, true);

        $obj = new QueryBuilderFilter("id", QueryBuilderTypeInterface::TYPE_STRING, [QueryBuilderOperatorInterface::OPERATOR_EQUAL]);
        $obj->setField("field");
        $obj->setInput(QueryBuilderInputInterface::INPUT_NUMBER);
        $obj->setLabel("label");
        $obj->setMultiple(true);
        $obj->setValidation($this->qbValidation);
        $obj->setValues(["values"]);

        $res = $obj->jsonSerialize();
        $this->assertCount(9, $res);

        $this->assertEquals($json, $res);
    }

    /**
     * Tests serializeQueryBuilderSet()
     *
     * @return void
     */
    public function testSerializeQueryBuilderFilterSet(): void {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderTypeInterface::TYPE_INTEGER, [QueryBuilderOperatorInterface::OPERATOR_EQUAL]);

        $data = file_get_contents(__DIR__ . "/JsonSerializerTest.testSerializeQueryBuilderFilterSet.json");
        $json = json_decode($data, true);

        $obj = new QueryBuilderFilterSet();
        $obj->addFilter($filter);

        $res = $obj->jsonSerialize();
        $this->assertCount(4, $res[0]);

        $this->assertEquals($json, $res);
    }

    /**
     * Tests serializeQueryBuilderValidation()
     *
     * @return void
     */
    public function testSerializeQueryBuilderValidation(): void {

        $data = file_get_contents(__DIR__ . "/JsonSerializerTest.testSerializeQueryBuilderValidation.json");
        $json = json_decode($data, true);

        $obj = new QueryBuilderValidation();
        $obj->setAllowEmptyValue(true);
        $obj->setCallback("callback");
        $obj->setFormat("format");
        $obj->setMax("max");
        $obj->setMessages([]);
        $obj->setMin("min");
        $obj->setStep(0);

        $res = $obj->jsonSerialize();
        $this->assertCount(7, $res);

        $this->assertEquals($json, $res);
    }
}
