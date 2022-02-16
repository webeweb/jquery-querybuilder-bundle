<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model;

use Exception;
use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderValidationInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder filter test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model
 */
class QueryBuilderFilterTest extends AbstractTestCase {

    /**
     * Tests jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_STRING, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $this->assertTrue(is_array($obj->jsonSerialize()));
    }

    /**
     * Tests setDecorator()
     *
     * @return void
     */
    public function testSetDecorator(): void {

        // Set a QueryBuilder decorator mock.
        $decorator = $this->getMockBuilder(QueryBuilderDecoratorInterface::class)->getMock();

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, []);

        $obj->setDecorator($decorator);
        $this->assertSame($decorator, $obj->getDecorator());
    }

    /**
     * Tests setLabel()
     *
     * @return void
     */
    public function testSetLabel(): void {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, []);

        $obj->setLabel("label");
        $this->assertEquals("label", $obj->getLabel());
    }

    /**
     * Tests setMultiple()
     *
     * @return void
     */
    public function testSetMultiple(): void {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, []);

        $obj->setMultiple(true);
        $this->assertTrue($obj->getMultiple());
    }

    /**
     * Tests setOperators()
     *
     * @return void
     */
    public function testSetOperators(): void {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, []);

        $obj->setOperators([QueryBuilderFilter::OPERATOR_EQUAL]);
        $this->assertEquals([QueryBuilderFilter::OPERATOR_EQUAL], $obj->getOperators());
    }

    /**
     * Tests setOperators()
     *
     * @return void
     */
    public function testSetOperatorsWithInvalidArgumentException(): void {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, []);

        try {

            $obj->setOperators(["exception"]);
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The operator "exception" is invalid', $ex->getMessage());
        }
    }

    /**
     * Tests setValidation()
     *
     * @return void
     */
    public function testSetValidation(): void {

        // Set a QueryBuilder validation mock.
        $validation = $this->getMockBuilder(QueryBuilderValidationInterface::class)->getMock();

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, []);

        $obj->setValidation($validation);
        $this->assertSame($validation, $obj->getValidation());
    }

    /**
     * Tests setValues()
     *
     * @return void
     */
    public function testSetValues(): void {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, []);

        $obj->setValues(["values"]);
        $this->assertEquals(["values"], $obj->getValues());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_BOOLEAN, []);

        $this->assertEquals("id", $obj->getId());
        $this->assertNull($obj->getField());
        $this->assertNull($obj->getInput());
        $this->assertEquals(QueryBuilderFilter::TYPE_BOOLEAN, $obj->getType());

        $this->assertNull($obj->getDecorator());
        $this->assertEquals("", $obj->getLabel());
        $this->assertFalse($obj->getMultiple());
        $this->assertEquals([], $obj->getOperators());
        $this->assertNull($obj->getValidation());
        $this->assertNull($obj->getValues());
    }
}
