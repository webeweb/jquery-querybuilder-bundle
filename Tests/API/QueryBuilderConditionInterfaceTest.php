<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;

/**
 * jQuery QueryBuilder condition interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 * @final
 */
final class QueryBuilderConditionInterfaceTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $this->assertEquals("AND", QueryBuilderConditionInterface::CONDITION_AND);
        $this->assertEquals("OR", QueryBuilderConditionInterface::CONDITION_OR);
    }

}
