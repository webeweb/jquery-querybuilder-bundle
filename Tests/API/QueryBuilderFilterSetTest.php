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

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder filter set test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 */
class QueryBuilderFilterSetTest extends AbstractTestCase {

    /**
     * Tests the addFilter() method.
     *
     * @return void
     */
    public function testAddFilter() {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();

        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertCount(1, $obj->getFilters());
    }

    /**
     * Tests the addFilter() method.
     *
     * @return void
     */
    public function testAddFilterWithSameId() {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();

        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertCount(1, $obj->getFilters());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new QueryBuilderFilterSet();

        $this->assertEquals([], $obj->getDecorators());
        $this->assertEquals([], $obj->getFilters());
    }

    /**
     * Tests the getDecorator() method.
     *
     * @return void
     */
    public function testGetDecorator() {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();

        $this->assertSame($obj, $obj->addFilter($filter));
        $this->assertNull($obj->getDecorator("id"));
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

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
    public function testRemoveFilter() {

        // Set a QueryBuilder filter mock.
        $filter = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);

        $obj = new QueryBuilderFilterSet();
        $obj->addFilter($filter);

        $this->assertSame($obj, $obj->removeFilter(new QueryBuilderFilter("bad", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL])));
        $this->assertCount(1, $obj->getFilters());

        $this->assertSame($obj, $obj->removeFilter($filter));
        $this->assertCount(0, $obj->getFilters());
    }
}
