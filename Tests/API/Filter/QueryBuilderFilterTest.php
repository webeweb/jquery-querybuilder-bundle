<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Filter;

use Exception;
use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Filter\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Validation\QueryBuilderValidation;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * jQuery QueryBuilder filter test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Filter
 * @final
 */
final class QueryBuilderFilterTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        try {
            new QueryBuilderFilter("id", "type", []);
        } catch (Exception $ex) {
            $this->assertInstanceOf(IllegalArgumentException::class, $ex, "The method __construct() does not throw the expecetd exception");
            $this->assertEquals("The type \"type\" is invalid", $ex->getMessage(), "The method getMessage() does not return the expected string");
        }

        try {
            new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, ["operator"]);
        } catch (Exception $ex) {
            $this->assertInstanceOf(IllegalArgumentException::class, $ex, "The method __construct() does not throw the expecetd exception");
            $this->assertEquals("The operator \"operator\" is invalid", $ex->getMessage(), "The method getMessage() does not return the expected string");
        }

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        try {
            $obj->setInput("input");
        } catch (Exception $ex) {
            $this->assertInstanceOf(IllegalArgumentException::class, $ex, "The method __construct() does not throw the expecetd exception");
            $this->assertEquals("The input \"input\" is invalid", $ex->getMessage(), "The method getMessage() does not return the expected string");
        }

        $this->assertEquals("id", $obj->getId(), "The method getId() does not return the expected value");
        $this->assertEquals("", $obj->getLabel(), "The method getLabel() does not return the expected value");
        $this->assertEquals(false, $obj->getMultiple(), "The method getMultiple() does not return the expected value");
        $this->assertEquals([QueryBuilderFilter::OPERATOR_EQUAL], $obj->getOperators(), "The method getOperators() does not return the expected value");
        $this->assertEquals(QueryBuilderFilter::TYPE_INTEGER, $obj->getType(), "The method getType() does not return the expected value");
        $this->assertEquals(null, $obj->getValidation(), "The method getValidation() does not return the expected value");
        $this->assertEquals(null, $obj->getValues(), "The method getValues() does not return the expected value");
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $res0 = ["id" => "id", "label" => "", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res0, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");

        $obj->setField("id");
        $res1 = ["id" => "id", "field" => "id", "label" => "", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res1, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");

        $obj->setLabel("label");
        $res2 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res2, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");

        $obj->setInput(QueryBuilderFilter::INPUT_NUMBER);
        $res3 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "input" => QueryBuilderFilter::INPUT_NUMBER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res3, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");

        $obj->setValues([1, 2, 3]);
        $res4 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "input" => QueryBuilderFilter::INPUT_NUMBER, "values" => [1, 2, 3], "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res4, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");

        $obj->setMultiple(true);
        $res5 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "input" => QueryBuilderFilter::INPUT_NUMBER, "values" => [1, 2, 3], "multiple" => true, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res5, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");

        $obj->setValidation(new QueryBuilderValidation());
        $res6 = ["id" => "id", "field" => "id", "label" => "label", "type" => QueryBuilderFilter::TYPE_INTEGER, "input" => QueryBuilderFilter::INPUT_NUMBER, "values" => [1, 2, 3], "multiple" => true, "validation" => [], "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res6, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");
    }

}
