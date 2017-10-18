<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Condition;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Condition\IQueryBuilderCondition;

/**
 * QueryBuilder condition interface.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Condition
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
