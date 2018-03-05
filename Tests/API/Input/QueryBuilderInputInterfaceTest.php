<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Input;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Input\QueryBuilderInputInterface;

/**
 * jQuery QueryBuilder input interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Input
 * @final
 */
final class QueryBuilderInputInterfaceTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $this->assertEquals("checkbox", QueryBuilderInputInterface::INPUT_CHECKBOX);
        $this->assertEquals("number", QueryBuilderInputInterface::INPUT_NUMBER);
        $this->assertEquals("radio", QueryBuilderInputInterface::INPUT_RADIO);
        $this->assertEquals("select", QueryBuilderInputInterface::INPUT_SELECT);
        $this->assertEquals("text", QueryBuilderInputInterface::INPUT_TEXT);
        $this->assertEquals("textarea", QueryBuilderInputInterface::INPUT_TEXTAREA);
    }

}
