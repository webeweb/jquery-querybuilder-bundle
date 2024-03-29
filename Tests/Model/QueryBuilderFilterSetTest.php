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

use JsonSerializable;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilterSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder filter set test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model
 */
class QueryBuilderFilterSetTest extends AbstractTestCase {

    /**
     * Test addFilter()
     *
     * @return void
     */
    public function testAddFilter(): void {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderTypeInterface::TYPE_INTEGER, [QueryBuilderOperatorInterface::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();

        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertNull($obj->getDecorator("id"));
        $this->assertSame($filter, $obj->getFilter("id"));
        $this->assertCount(1, $obj->getFilters());
    }

    /**
     * Test addFilter()
     *
     * @return void
     */
    public function testAddFilterWithSameId(): void {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderTypeInterface::TYPE_INTEGER, [QueryBuilderOperatorInterface::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();

        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertCount(1, $obj->getFilters());
    }

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new QueryBuilderFilterSet();

        $this->assertIsArray($obj->jsonSerialize());
    }

    /**
     * Test removeFilter()
     *
     * @return void
     */
    public function testRemoveFilter(): void {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderTypeInterface::TYPE_INTEGER, [QueryBuilderOperatorInterface::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();
        $obj->addFilter($filter);

        $this->assertSame($obj, $obj->removeFilter(new QueryBuilderFilter("bad", QueryBuilderTypeInterface::TYPE_INTEGER, [QueryBuilderOperatorInterface::OPERATOR_EQUAL])));
        $this->assertCount(1, $obj->getFilters());

        $this->assertSame($obj, $obj->removeFilter($filter));
        $this->assertCount(0, $obj->getFilters());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new QueryBuilderFilterSet();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(QueryBuilderFilterSetInterface::class, $obj);

        $this->assertNull($obj->getDecorator("id"));
        $this->assertNull($obj->getFilter("id"));
        $this->assertEquals([], $obj->getFilters());
    }
}
