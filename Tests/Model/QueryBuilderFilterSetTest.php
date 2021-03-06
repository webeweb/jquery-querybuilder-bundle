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

use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderFilterSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder filter set test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model
 */
class QueryBuilderFilterSetTest extends AbstractTestCase {

    /**
     * Tests the addFilter() method.
     *
     * @return void
     */
    public function testAddFilter(): void {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();

        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertNull($obj->getDecorator("id"));
        $this->assertSame($filter, $obj->getFilter("id"));
        $this->assertCount(1, $obj->getFilters());
    }

    /**
     * Tests the addFilter() method.
     *
     * @return void
     */
    public function testAddFilterWithSameId(): void {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();

        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertCount(1, $obj->getFilters());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();
        $obj->addFilter($filter);

        $this->assertTrue(is_array($obj->jsonSerialize()));
    }

    /**
     * Tests the removeFilter() method.
     *
     * @return void
     */
    public function testRemoveFilter(): void {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();
        $obj->addFilter($filter);

        $this->assertSame($obj, $obj->removeFilter(new QueryBuilderFilter("bad", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL])));
        $this->assertCount(1, $obj->getFilters());

        $this->assertSame($obj, $obj->removeFilter($filter));
        $this->assertCount(0, $obj->getFilters());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new QueryBuilderFilterSet();

        $this->assertNull($obj->getDecorator("id"));
        $this->assertNull($obj->getFilter("id"));
        $this->assertEquals([], $obj->getFilters());
    }
}
