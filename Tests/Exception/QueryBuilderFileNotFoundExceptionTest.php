<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Exception;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Exception\QueryBuilderFileNotFoundException;

/**
 * jQuery QueryBuilder file not found exception test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Exception
 * @version 2.4.3
 * @final
 */
final class QueryBuilderFileNotFoundExceptionTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the __construct() method.
	 *
	 * @return void
	 */
	public function testConstruct() {

		$obj = new QueryBuilderFileNotFoundException("filepath");

		$res = "The file \"filepath\" was not found";
		$this->assertEquals($res, $obj->getMessage(), "The method getMessage() does not return the expected value");
	}

}
