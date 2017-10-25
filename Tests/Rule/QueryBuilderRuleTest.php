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
        $this->assertEquals(null, $obj->getDecorator(), "The method getDecorator() does not return the expected value");
        $this->assertEquals("id", $obj->getField(), "The method getField() does not return the expected value");
        $this->assertEquals(QueryBuilderRule::INPUT_NUMBER, $obj->getInput(), "The method getInput() does not return the expected value");
        $this->assertEquals(QueryBuilderRule::OPERATOR_EQUAL, $obj->getOperator(), "The method getOperator() does not return the expected value");
        $this->assertEquals(QueryBuilderRule::TYPE_INTEGER, $obj->getType(), "The method getType() does not return the expected value");
        $this->assertEquals(1, $obj->getValue(), "The method getValue() does not return the expected value");
    }

    /**
     * Tests the toSQL() method.
     */
    public function testToSQL() {

        // Initialize the rule.
        $rule = ["id" => "id", "field" => "id", "input" => QueryBuilderRule::INPUT_TEXT, "type" => QueryBuilderRule::TYPE_STRING, "value" => "val'ue"];

        $res01 = "id LIKE 'val\'ue%'";
        $this->assertEquals($res01, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_BEGINS_WITH])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_BEGINS_WITH");

        $rule2          = array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_BETWEEN]);
        $rule2["value"] = ["value1", "value2"];

        $res02 = "id BETWEEN 'value1' AND 'value2'";
        $this->assertEquals($res02, (new QueryBuilderRule($rule2))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_CONTAINS");

        $res03 = "id LIKE '%val\'ue%'";
        $this->assertEquals($res03, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_CONTAINS])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_CONTAINS");

        $res04 = "id LIKE '%val\'ue'";
        $this->assertEquals($res04, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_ENDS_WITH])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_ENDS_WITH");

        $res05 = "id = 'val\'ue'";
        $this->assertEquals($res05, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_EQUAL])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_EQUAL");

        $res06 = "id > 'val\'ue'";
        $this->assertEquals($res06, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_GREATER])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_GREATER");

        $res07 = "id >= 'val\'ue'";
        $this->assertEquals($res07, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_GREATER_OR_EQUAL])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_GREATER_OR_EQUAL");

        $res08 = "id IS NULL";
        $this->assertEquals($res08, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_IS_EMPTY])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_IS_EMPTY");

        $res09 = "id IS NOT NULL";
        $this->assertEquals($res09, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_IS_NOT_EMPTY])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_IS_NOT_EMPTY");

        $res10 = "id IS NOT NULL";
        $this->assertEquals($res10, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_IS_NOT_NULL])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_IS_NOT_NULL");

        $res11 = "id IS NULL";
        $this->assertEquals($res11, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_IS_NULL])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_IS_NULL");

        $res12 = "id < 'val\'ue'";
        $this->assertEquals($res12, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_LESS])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_LESS");

        $res13 = "id <= 'val\'ue'";
        $this->assertEquals($res13, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_LESS_OR_EQUAL])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_LESS_OR_EQUAL");

        $res14 = "id NOT LIKE 'val\'ue%'";
        $this->assertEquals($res14, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_NOT_BEGINS_WITH])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_NOT_BEGINS_WITH");

        $rule2["operator"] = QueryBuilderRule::OPERATOR_NOT_BETWEEN;

        $res15 = "id NOT BETWEEN 'value1' AND 'value2'";
        $this->assertEquals($res15, (new QueryBuilderRule($rule2))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_NOT_BEGINS_WITH");

        $res16 = "id NOT LIKE '%val\'ue%'";
        $this->assertEquals($res16, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_NOT_CONTAINS])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_NOT_CONTAINS");

        $res17 = "id NOT LIKE '%val\'ue'";
        $this->assertEquals($res17, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_NOT_ENDS_WITH])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_NOT_ENDS_WITH");

        $res18 = "id <> 'val\'ue'";
        $this->assertEquals($res18, (new QueryBuilderRule(array_merge($rule, ["operator" => QueryBuilderRule::OPERATOR_NOT_EQUAL])))->toSQL(), "The method toSQL() does not return the expected string with OPERATOR_NOT_EQUAL");
    }

}
