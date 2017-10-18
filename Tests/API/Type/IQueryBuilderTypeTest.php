<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\JQuery\QueryBuilderBundle\Tests\API\Type;

use PHPUnit_Framework_TestCase;
use WBW\JQuery\QueryBuilderBundle\API\Type\IQueryBuilderType;

/**
 * jQuery QueryBuilder type interface test.
 *
 * @author WBW <https://github.com/webeweb/WBWJQueryQueryBuilderBundle>
 * @package WBW\JQuery\QueryBuilderBundle\Tests\API\Type
 * @version 2.4.3
 * @final
 */
final class IQueryBuilderTypeTest extends PHPUnit_Framework_TestCase {

    /**
     * Test the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $this->assertEquals("boolean", IQueryBuilderType::TYPE_BOOLEAN, "The constant TYPE_BOOLEAN does not contain the expected value");
        $this->assertEquals("date", IQueryBuilderType::TYPE_DATE, "The constant TYPE_DATE does not contain the expected value");
        $this->assertEquals("datetime", IQueryBuilderType::TYPE_DATETIME, "The constant TYPE_DATETIME does not contain the expected value");
        $this->assertEquals("double", IQueryBuilderType::TYPE_DOUBLE, "The constant TYPE_DOUBLE does not contain the expected value");
        $this->assertEquals("integer", IQueryBuilderType::TYPE_INTEGER, "The constant TYPE_INTEGER does not contain the expected value");
        $this->assertEquals("string", IQueryBuilderType::TYPE_STRING, "The constant TYPE_STRING does not contain the expected value");
        $this->assertEquals("time", IQueryBuilderType::TYPE_TIME, "The constant TYPE_TIME does not contain the expected value");
    }

}
