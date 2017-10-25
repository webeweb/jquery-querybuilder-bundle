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
     * Test the __construct() method.
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

        $this->assertEquals("id", $obj->getId(), "The method getId() does not return the expected value");
        $this->assertEquals("", $obj->getLabel(), "The method getLabel() does not return the expected value");
        $this->assertEquals(false, $obj->getMultiple(), "The method getMultiple() does not return the expected value");
        $this->assertEquals([QueryBuilderFilter::OPERATOR_EQUAL], $obj->getOperators(), "The method getOperators() does not return the expected value");
        $this->assertEquals(QueryBuilderFilter::TYPE_INTEGER, $obj->getType(), "The method getType() does not return the expected value");
    }

    /**
     * Test the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $res = ["id" => "id", "label" => "", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]];
        $this->assertEquals($res, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");
    }

}
