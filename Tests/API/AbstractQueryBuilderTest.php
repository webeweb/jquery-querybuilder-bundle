<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API;

use Exception;
use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\API\TestQueryBuilder;

/**
 * Abstract QueryBuilder test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 */
class AbstractQueryBuilderTest extends AbstractTestCase {

    /**
     * Tests the setField() method.
     *
     * @return void
     */
    public function testSetField() {

        $obj = new TestQueryBuilder();

        $obj->setField("field");
        $this->assertEquals("field", $obj->getField());
    }

    /**
     * Tests the setId() method.
     *
     * @return void
     */
    public function testSetId() {

        $obj = new TestQueryBuilder();

        $obj->setId("id");
        $this->assertEquals("id", $obj->getId());
    }

    /**
     * Tests the setInput() method.
     *
     * @return void
     */
    public function testSetInput() {

        $obj = new TestQueryBuilder();

        $obj->setInput(QueryBuilderInputInterface::INPUT_CHECKBOX);
        $this->assertEquals(QueryBuilderInputInterface::INPUT_CHECKBOX, $obj->getInput());
    }

    /**
     * Tests the setInput() method.
     *
     * @return void
     */
    public function testSetInputWithInvalidArgumentException() {

        $obj = new TestQueryBuilder();

        try {

            $obj->setInput("input");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The input \"input\" is invalid", $ex->getMessage());
        }
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetType() {

        $obj = new TestQueryBuilder();

        $obj->setType(QueryBuilderTypeInterface::TYPE_BOOLEAN);
        $this->assertEquals(QueryBuilderTypeInterface::TYPE_BOOLEAN, $obj->getType());
    }

    /**
     * Tests the setType() method.
     *
     * @return void
     */
    public function testSetTypeWithInvalidArgumentException() {

        $obj = new TestQueryBuilder();

        try {

            $obj->setType("type");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The type \"type\" is invalid", $ex->getMessage());
        }
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function test__construct() {

        $obj = new TestQueryBuilder();

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getField());
        $this->assertNull($obj->getInput());
        $this->assertNull($obj->getType());
    }
}
