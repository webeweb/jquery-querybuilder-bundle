<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API;

use Exception;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderValidation;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractFrameworkTestCase;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * jQuery QueryBuilder filter test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 */
class QueryBuilderFilterTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        // ===
        try {

            new QueryBuilderFilter("id", "exception", []);
        } catch (Exception $ex) {

            $this->assertInstanceOf(IllegalArgumentException::class, $ex);
            $this->assertEquals("The type \"exception\" is invalid", $ex->getMessage());
        }

        // ===
        try {

            new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, ["exception"]);
        } catch (Exception $ex) {

            $this->assertInstanceOf(IllegalArgumentException::class, $ex);
            $this->assertEquals("The operator \"exception\" is invalid", $ex->getMessage());
        }

        // ===
        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        // ===
        try {

            $obj->setInput("exception");
        } catch (Exception $ex) {

            $this->assertInstanceOf(IllegalArgumentException::class, $ex);
            $this->assertEquals("The input \"exception\" is invalid", $ex->getMessage());
        }

        // ===
        $this->assertEquals("id", $obj->getId());
        $this->assertEquals("", $obj->getLabel());
        $this->assertFalse($obj->getMultiple());
        $this->assertEquals([QueryBuilderFilter::OPERATOR_EQUAL], $obj->getOperators());
        $this->assertEquals(QueryBuilderFilter::TYPE_INTEGER, $obj->getType());
        $this->assertNull($obj->getValidation());
        $this->assertNull($obj->getValues());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $res0 = ["id" => "id", "label" => "", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res0, $obj->jsonSerialize());

        $obj->setField("id");
        $res1 = ["id" => "id", "field" => "id", "label" => "", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res1, $obj->jsonSerialize());

        $obj->setLabel("label");
        $res2 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res2, $obj->jsonSerialize());

        $obj->setInput(QueryBuilderFilter::INPUT_NUMBER);
        $res3 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "input" => QueryBuilderFilter::INPUT_NUMBER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res3, $obj->jsonSerialize());

        $obj->setValues([1, 2, 3]);
        $res4 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "input" => QueryBuilderFilter::INPUT_NUMBER, "values" => [1, 2, 3], "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res4, $obj->jsonSerialize());

        $obj->setMultiple(true);
        $res5 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "input" => QueryBuilderFilter::INPUT_NUMBER, "values" => [1, 2, 3], "multiple" => true, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res5, $obj->jsonSerialize());

        $obj->setValidation(new QueryBuilderValidation());
        $res6 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "input" => QueryBuilderFilter::INPUT_NUMBER, "values" => [1, 2, 3], "multiple" => true, "validation" => [], "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res6, $obj->jsonSerialize());
    }

}
