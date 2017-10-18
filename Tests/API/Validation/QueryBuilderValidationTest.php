<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Validation;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Validation\QueryBuilderValidation;

/**
 * jQuery QueryBuilder validation test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Validation
 * @version 2.4.3
 * @final
 */
final class QueryBuilderValidationTest extends PHPUnit_Framework_TestCase {

    /**
     * Test the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $obj = new QueryBuilderValidation();

        $obj->setAllowEmptyValue(true);
        $this->assertEquals(true, $obj->getAllowEmptyValue(), "The method getAllowEmptyValue() does not return the expected value");

        $obj->setCallback("callback");
        $this->assertEquals("callback", $obj->getCallback(), "The method getCallback() does not return the expected value");

        $obj->setFormat("format");
        $this->assertEquals("format", $obj->getFormat(), "The method getFormat() does not return the expected value");

        $obj->setMax(1);
        $this->assertEquals(1, $obj->getMax(), "The method getMax() does not return the expected value");

        $obj->setMessages([]);
        $this->assertEquals([], $obj->getMessages(), "The method getMessages() does not return the expected value");

        $obj->setMin(0);
        $this->assertEquals(0, $obj->getMin(), "The method getMin() does not return the expected value");

        $obj->setStep(1);
        $this->assertEquals(1, $obj->getStep(), "The method getStep() does not return the expected value");
    }

    /**
     * Test the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new QueryBuilderValidation();

        $this->assertEquals([], $obj->jsonSerialize(), "The method jsonSerialize() does not return the expected value");
    }

    /**
     * Test the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = new QueryBuilderValidation();

        $res0 = [];
        $this->assertEquals($res0, $obj->toArray(), "The method toArray() does not return the expected array");

        $obj->setFormat("format");
        $res1 = ["format" => "format"];
        $this->assertEquals($res1, $obj->toArray(), "The method toArray() does not return the expected array with format");

        $obj->setMin("min");
        $res2 = ["format" => "format", "min" => "min"];
        $this->assertEquals($res2, $obj->toArray(), "The method toArray() does not return the expected array with min");

        $obj->setMax("max");
        $res3 = ["format" => "format", "min" => "min", "max" => "max"];
        $this->assertEquals($res3, $obj->toArray(), "The method toArray() does not return the expected array with max");

        $obj->setStep(0);
        $res4 = ["format" => "format", "min" => "min", "max" => "max", "step" => 0];
        $this->assertEquals($res4, $obj->toArray(), "The method toArray() does not return the expected array with step");

        $obj->setMessages([]);
        $res5 = ["format" => "format", "min" => "min", "max" => "max", "step" => 0, "messages" => []];
        $this->assertEquals($res5, $obj->toArray(), "The method toArray() does not return the expected array with messages");

        $obj->setAllowEmptyValue(true);
        $res6 = ["format" => "format", "min" => "min", "max" => "max", "step" => 0, "messages" => [], "allow_empty_value" => true];
        $this->assertEquals($res6, $obj->toArray(), "The method toArray() does not return the expected array with allow empty value");

        $obj->setCallback("callback");
        $res7 = ["format" => "format", "min" => "min", "max" => "max", "step" => 0, "messages" => [], "allow_empty_value" => true, "callback" => "callback"];
        $this->assertEquals($res7, $obj->toArray(), "The method toArray() does not return the expected array with callback");
    }

}
