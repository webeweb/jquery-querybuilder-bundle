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

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Filter\QueryBuilderFilter;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Filter\QueryBuilderFilterSet;

/**
 * jQuery QueryBuilder filter set test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Filter
 * @final
 */
final class QueryBuilderFilterSetTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the __construct() method.
	 *
	 * @return void
	 */
	public function testConstructor() {

		$obj = new QueryBuilderFilterSet();

		$this->assertEquals(null, $obj->getDecorator("id"), "The method getDecorator() does not return the expected value with \"id\"");
		$this->assertEquals([], $obj->getFilters(), "The method getFilters() does not return the expected value");
	}

	/**
	 * Tests the addFilter() method.
	 *
	 * @return void
	 */
	public function testAddFilter() {

		$obj = new QueryBuilderFilterSet();

		$obj->addFilter(new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]));
		$this->assertCount(1, $obj->getFilters(), "The method getFilters() does not return the expected array");

		$obj->addFilter(new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]));
		$this->assertCount(1, $obj->getFilters(), "The method getFilters() does not return the expected array");
	}

	/**
	 * Tests the jsonSerialize() method.
	 *
	 * @return void
	 */
	public function testJsonSerialize() {

		$obj = new QueryBuilderFilterSet();

		$res0 = [];
		$this->assertEquals($res0, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");

		$obj->addFilter(new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]));
		$res1 = [["id" => "id", "label" => "", "type" => QueryBuilderFilter::TYPE_INTEGER, "operators" => [QueryBuilderFilter::OPERATOR_EQUAL]]];
		$this->assertEquals($res1, $obj->jsonSerialize(), "The method jsonSerialize does not return the expected array");
	}

	/**
	 * Tests the removeFilter() method.
	 *
	 * @return void
	 */
	public function testRemoveFilter() {

		$obj = new QueryBuilderFilterSet();

		$flt = new QueryBuilderFilter("id", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]);
		$obj->addFilter($flt);

		$this->assertCount(1, $obj->getFilters(), "The method getFilters() does not return the expected array");

		$obj->removeFilter(new QueryBuilderFilter("bad", QueryBuilderFilter::TYPE_INTEGER, [QueryBuilderFilter::OPERATOR_EQUAL]));
		$this->assertCount(1, $obj->getFilters(), "The method getFilters() does not return the expected array");

		$obj->removeFilter($flt);
		$this->assertCount(0, $obj->getFilters(), "The method getFilters() does not return the expected array");
	}

}
