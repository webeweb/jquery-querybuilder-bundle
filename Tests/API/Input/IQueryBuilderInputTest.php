<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\JQuery\QueryBuilderBundle\Tests\API\Input;

use PHPUnit_Framework_TestCase;
use WBW\JQuery\QueryBuilderBundle\API\Input\IQueryBuilderInput;

/**
 * QueryBuilder input interface.
 *
 * @author WBW <https://github.com/webeweb/WBWJQueryQueryBuilderBundle>
 * @package WBW\JQuery\QueryBuilderBundle\Tests\API\Input
 * @version 2.4.3
 * @final
 */
final class IQueryBuilderInputTest extends PHPUnit_Framework_TestCase {

    /**
     * Test the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $this->assertEquals("checkbox", IQueryBuilderInput::INPUT_CHECKBOX, "The constant INPUT_CHECKBOX does not return the expected value");
        $this->assertEquals("number", IQueryBuilderInput::INPUT_NUMBER, "The constant INPUT_NUMBER does not return the expected value");
        $this->assertEquals("radio", IQueryBuilderInput::INPUT_RADIO, "The constant INPUT_RADIO does not return the expected value");
        $this->assertEquals("select", IQueryBuilderInput::INPUT_SELECT, "The constant INPUT_SELECT does not return the expected value");
        $this->assertEquals("text", IQueryBuilderInput::INPUT_TEXT, "The constant INPUT_TEXT does not return the expected value");
        $this->assertEquals("textarea", IQueryBuilderInput::INPUT_TEXTAREA, "The constant INPUT_TEXTAREA does not return the expected value");
    }

}
