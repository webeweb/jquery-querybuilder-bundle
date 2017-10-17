<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\JQuery\QueryBuilderBundle\Tests\API\Condition;

use PHPUnit_Framework_TestCase;
use WBW\JQuery\QueryBuilderBundle\API\Condition\IQueryBuilderCondition;

/**
 * QueryBuilder condition interface.
 *
 * @author WBW <https://github.com/webeweb/WBWJQueryQueryBuilderBundle>
 * @package WBW\JQuery\QueryBuilderBundle\Tests\API\Condition
 * @version 2.4.3
 * @final
 */
final class IQueryBuilderConditionTest extends PHPUnit_Framework_TestCase {

    /**
     * Test the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $this->assertEquals("AND", IQueryBuilderCondition::CONDITION_AND, "The constant CONDITION_AND does not return the expected value");
        $this->assertEquals("OR", IQueryBuilderCondition::CONDITION_OR, "The constant CONDITION_OR does not return the expected value");
    }

}
