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
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractFrameworkTestCase;

/**
 * jQuery QueryBuilder filter set test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 */
class QueryBuilderFilterSetTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new QueryBuilderFilterSet();

        $this->assertNull($obj->getDecorator("id"));
        $this->assertEquals([], $obj->getFilters());
    }

    /**
     * Tests the addFilter() method.
     *
     * @return void
     */
    public function testAddFilter() {

        $obj = new QueryBuilderFilterSet();

        // ===
        $this->assertSame($obj, $obj->addFilter(new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL])));
        $this->assertCount(1, $obj->getFilters());

        // ===
        $this->assertSame($obj, $obj->addFilter(new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL])));
        $this->assertCount(1, $obj->getFilters());
    }

    /**
     * Tests the jsonSerialize() method.
     *
     * @return void
     */
    public function testJsonSerialize() {

        $obj = new QueryBuilderFilterSet();

        // ===
        $res0 = [];
        $this->assertEquals($res0, $obj->jsonSerialize());

        // ===
        $obj->addFilter(new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]));
        $res1 = [["id" => "id", "label" => "", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]]];
        $this->assertEquals($res1, $obj->jsonSerialize());
    }

    /**
     * Tests the removeFilter() method.
     *
     * @return void
     */
    public function testRemoveFilter() {

        $obj = new QueryBuilderFilterSet();

        // ===
        $flt = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);
        $this->assertSame($obj, $obj->addFilter($flt));
        $this->assertCount(1, $obj->getFilters());

        // ===
        $this->assertSame($obj, $obj->removeFilter(new QueryBuilderFilter("bad", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL])));
        $this->assertCount(1, $obj->getFilters());

        // ===
        $this->assertSame($obj, $obj->removeFilter($flt));
        $this->assertCount(0, $obj->getFilters());
    }

}
