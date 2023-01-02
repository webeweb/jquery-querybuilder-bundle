<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model;

use InvalidArgumentException;
use Throwable;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder rule test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model
 */
class QueryBuilderRuleTest extends AbstractTestCase {

    /**
     * Tests setDecorator()
     *
     * @return void
     */
    public function testSetDecorator(): void {

        $obj = new QueryBuilderRule();

        $obj->setDecorator($this->qbDecorator);
        $this->assertSame($this->qbDecorator, $obj->getDecorator());
    }

    /**
     * Tests setOperator()
     *
     * @return void
     */
    public function testSetOperator(): void {

        $obj = new QueryBuilderRule();

        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH);
        $this->assertEquals(QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH, $obj->getOperator());
    }

    /**
     * Tests setOperator()
     *
     * @return void
     */
    public function testSetOperatorWithInvalidArgumentException(): void {

        $obj = new QueryBuilderRule();

        try {

            $obj->setOperator("operator");
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The operator "operator" is invalid', $ex->getMessage());
        }
    }

    /**
     * Tests setValue()
     *
     * @return void
     */
    public function testSetValue(): void {

        $obj = new QueryBuilderRule();

        $obj->setValue("value");
        $this->assertEquals("value", $obj->getValue());
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new QueryBuilderRule();

        $this->assertInstanceOf(QueryBuilderRuleInterface::class, $obj);

        $this->assertNull($obj->getDecorator());
        $this->assertNull($obj->getField());
        $this->assertNull($obj->getId());
        $this->assertNull($obj->getInput());
        $this->assertNull($obj->getOperator());
        $this->assertNull($obj->getType());
        $this->assertNull($obj->getValue());
    }
}
