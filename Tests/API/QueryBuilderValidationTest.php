<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderValidation;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractFrameworkTestCase;

/**
 * jQuery QueryBuilder validation test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 */
class QueryBuilderValidationTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new QueryBuilderValidation();

        $this->assertNull($obj->getAllowEmptyValue());
        $this->assertNull($obj->getCallback());
        $this->assertNull($obj->getFormat());
        $this->assertNull($obj->getMax());
        $this->assertNull($obj->getMessages());
        $this->assertNull($obj->getMin());
        $this->assertNull($obj->getStep());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new QueryBuilderValidation();

        $this->assertEquals([], $obj->jsonSerialize());
    }

    /**
     * Tests the setAllowEmptyValue() method.
     *
     * @return void
     */
    public function testSetAllowEmptyValue() {

        $obj = new QueryBuilderValidation();

        $obj->setAllowEmptyValue(true);
        $this->assertTrue($obj->getAllowEmptyValue());
    }

    /**
     * Tests the setCallback() method.
     *
     * @return void
     */
    public function testSetCallback() {

        $obj = new QueryBuilderValidation();

        $obj->setCallback("callback");
        $this->assertEquals("callback", $obj->getCallback());
    }

    /**
     * Tests the setFormat() method.
     *
     * @return void
     */
    public function testSetFormat() {

        $obj = new QueryBuilderValidation();

        $obj->setFormat("format");
        $this->assertEquals("format", $obj->getFormat());
    }

    /**
     * Tests the setMax() method.
     *
     * @return void
     */
    public function testSetMax() {

        $obj = new QueryBuilderValidation();

        $obj->setMax(1);
        $this->assertEquals(1, $obj->getMax());
    }

    /**
     * Tests the setMessages() method.
     *
     * @return void
     */
    public function testSetMessages() {

        $obj = new QueryBuilderValidation();

        $obj->setMessages([]);
        $this->assertEquals([], $obj->getMessages());
    }

    /**
     * Tests the setMin() method.
     *
     * @return void
     */
    public function testSetMin() {

        $obj = new QueryBuilderValidation();

        $obj->setMin(0);
        $this->assertEquals(0, $obj->getMin());
    }

    /**
     * Tests the setStep() method.
     *
     * @return void
     */
    public function testSetStep() {

        $obj = new QueryBuilderValidation();

        $obj->setStep(1);
        $this->assertEquals(1, $obj->getStep());
    }

    /**
     * Tests the toArray() method.
     *
     * @return void
     */
    public function testToArray() {

        $obj = new QueryBuilderValidation();

        $res0 = [];
        $this->assertEquals($res0, $obj->toArray());

        $obj->setFormat("format");
        $res1 = ["format" => "format"];
        $this->assertEquals($res1, $obj->toArray());

        $obj->setMin("min");
        $res2 = ["format" => "format", "min" => "min"];
        $this->assertEquals($res2, $obj->toArray());

        $obj->setMax("max");
        $res3 = ["format" => "format", "min" => "min", "max" => "max"];
        $this->assertEquals($res3, $obj->toArray());

        $obj->setStep(0);
        $res4 = ["format" => "format", "min" => "min", "max" => "max", "step" => 0];
        $this->assertEquals($res4, $obj->toArray());

        $obj->setMessages([]);
        $res5 = ["format" => "format", "min" => "min", "max" => "max", "step" => 0, "messages" => []];
        $this->assertEquals($res5, $obj->toArray());

        $obj->setAllowEmptyValue(true);
        $res6 = ["format" => "format", "min" => "min", "max" => "max", "step" => 0, "messages" => [], "allow_empty_value" => true];
        $this->assertEquals($res6, $obj->toArray());

        $obj->setCallback("callback");
        $res7 = ["format" => "format", "min" => "min", "max" => "max", "step" => 0, "messages" => [], "allow_empty_value" => true, "callback" => "callback"];
        $this->assertEquals($res7, $obj->toArray());
    }

}
