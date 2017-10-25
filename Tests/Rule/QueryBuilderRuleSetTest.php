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
use WBW\Bundle\JQuery\QueryBuilderBundle\Rule\QueryBuilderRuleSet;

/**
 * jQuery QueryBuilder rule set test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 * @final
 */
final class QueryBuilderRuleSetTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new QueryBuilderRuleSet([], null);

        $this->assertEquals(null, $obj->getCondition(), "The method getCondition() does not return the expected value");
        $this->assertEquals([], $obj->getRules(), "The method getRules() does not return the expected value");
        $this->assertEquals(false, $obj->getValid(), "The method getRules() does not return the expected value");
    }

    /**
     * Tests the toSQL() method.
     *
     * @return void
     */
    public function testToSQL() {

        $rules = [
            "condition" => "OR",
            "rules"     => [
                ["id" => "age", "field" => "age", "input" => QueryBuilderRule::INPUT_NUMBER, "operator" => QueryBuilderRule::OPERATOR_GREATER, "type" => QueryBuilderRule::TYPE_INTEGER, "value" => "21"],
                [
                    "condition" => "AND",
                    "rules"     => [
                        ["id" => "firstname", "field" => "firstname", "input" => QueryBuilderRule::INPUT_TEXT, "operator" => QueryBuilderRule::OPERATOR_EQUAL, "type" => QueryBuilderRule::TYPE_STRING, "value" => "John"],
                        ["id" => "lastname", "field" => "lastname", "input" => QueryBuilderRule::INPUT_NUMBER, "operator" => QueryBuilderRule::OPERATOR_EQUAL, "type" => QueryBuilderRule::TYPE_STRING, "value" => "DOE"],
                    ],
                ],
            ],
            "valid"     => true,
        ];

        $obj = new QueryBuilderRuleSet($rules, null);

        $res = "(age > 21 OR (firstname = 'John' AND lastname = 'DOE'))";
        $this->assertEquals($res, $obj->toSQL(), "The method toSQL() does not return the expected string");
    }

}
