<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Rule;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Rule\QueryBuilderRule;

/**
 * jQuery QueryBuilder rule test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 * @final
 */
final class QueryBuilderRuleTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     */
    public function testConstruct() {

        $obj = new QueryBuilderRule(["id" => "id", "field" => "id", "input" => QueryBuilderRule::INPUT_NUMBER, "operator" => QueryBuilderRule::OPERATOR_EQUAL, "type" => QueryBuilderRule::TYPE_INTEGER, "value" => 1]);

        $this->assertEquals("id", $obj->getId(), "The method getId() does not return the expected value");
        $this->assertEquals("id", $obj->getField(), "The method getField() does not return the expected value");
        $this->assertEquals(QueryBuilderRule::INPUT_NUMBER, $obj->getInput(), "The method getInput() does not return the expected value");
        $this->assertEquals(QueryBuilderRule::OPERATOR_EQUAL, $obj->getOperator(), "The method getOperator() does not return the expected value");
        $this->assertEquals(QueryBuilderRule::TYPE_INTEGER, $obj->getType(), "The method getType() does not return the expected value");
        $this->assertEquals(1, $obj->getValue(), "The method getValue() does not return the expected value");
    }

}
