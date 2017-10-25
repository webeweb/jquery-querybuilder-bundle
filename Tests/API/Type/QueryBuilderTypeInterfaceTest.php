<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Type;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Type\QueryBuilderTypeInterface;

/**
 * jQuery QueryBuilder type interface test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Type
 * @final
 */
final class QueryBuilderTypeInterfaceTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $this->assertEquals("boolean", QueryBuilderTypeInterface::TYPE_BOOLEAN, "The constant TYPE_BOOLEAN does not contain the expected value");
        $this->assertEquals("date", QueryBuilderTypeInterface::TYPE_DATE, "The constant TYPE_DATE does not contain the expected value");
        $this->assertEquals("datetime", QueryBuilderTypeInterface::TYPE_DATETIME, "The constant TYPE_DATETIME does not contain the expected value");
        $this->assertEquals("double", QueryBuilderTypeInterface::TYPE_DOUBLE, "The constant TYPE_DOUBLE does not contain the expected value");
        $this->assertEquals("integer", QueryBuilderTypeInterface::TYPE_INTEGER, "The constant TYPE_INTEGER does not contain the expected value");
        $this->assertEquals("string", QueryBuilderTypeInterface::TYPE_STRING, "The constant TYPE_STRING does not contain the expected value");
        $this->assertEquals("time", QueryBuilderTypeInterface::TYPE_TIME, "The constant TYPE_TIME does not contain the expected value");
    }

}
