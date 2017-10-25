<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Operator;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Operator\QueryBuilderOperatorInterface;

/**
 * QueryBuilder operator interface test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Operator
 * @final
 */
final class QueryBuilderOperatorInterfaceTest extends PHPUnit_Framework_TestCase {

    /**
     * Test the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $this->assertEquals("begins_with", QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH, "The constant OPERATOR_BEGINS_WITH does not return the expected value");
        $this->assertEquals("between", QueryBuilderOperatorInterface::OPERATOR_BETWEEN, "The constant OPERATOR_BETWEEN does not return the expected value");
        $this->assertEquals("contains", QueryBuilderOperatorInterface::OPERATOR_CONTAINS, "The constant OPERATOR_CONTAINS does not return the expected value");
        $this->assertEquals("ends_with", QueryBuilderOperatorInterface::OPERATOR_ENDS_WITH, "The constant OPERATOR_ENDS_WITH does not return the expected value");
        $this->assertEquals("equal", QueryBuilderOperatorInterface::OPERATOR_EQUAL, "The constant OPERATOR_EQUAL does not return the expected value");
        $this->assertEquals("greater", QueryBuilderOperatorInterface::OPERATOR_GREATER, "The constant OPERATOR_GREATER does not return the expected value");
        $this->assertEquals("greater_or_equal", QueryBuilderOperatorInterface::OPERATOR_GREATER_OR_EQUAL, "The constant OPERATOR_GREATER_OR_EQUAL does not return the expected value");
        $this->assertEquals("in", QueryBuilderOperatorInterface::OPERATOR_IN, "The constant OPERATOR_IN does not return the expected value");
        $this->assertEquals("is_empty", QueryBuilderOperatorInterface::OPERATOR_IS_EMPTY, "The constant OPERATOR_IS_EMPTY does not return the expected value");
        $this->assertEquals("is_not_empty", QueryBuilderOperatorInterface::OPERATOR_IS_NOT_EMPTY, "The constant OPERATOR_IS_NOT_EMPTY does not return the expected value");
        $this->assertEquals("is_not_null", QueryBuilderOperatorInterface::OPERATOR_IS_NOT_NULL, "The constant OPERATOR_IS_NOT_NULL does not return the expected value");
        $this->assertEquals("is_null", QueryBuilderOperatorInterface::OPERATOR_IS_NULL, "The constant OPERATOR_IS_NULL does not return the expected value");
        $this->assertEquals("less", QueryBuilderOperatorInterface::OPERATOR_LESS, "The constant OPERATOR_LESS does not return the expected value");
        $this->assertEquals("less_or_equal", QueryBuilderOperatorInterface::OPERATOR_LESS_OR_EQUAL, "The constant OPERATOR_LESS_OR_EQUAL does not return the expected value");
        $this->assertEquals("not_begins_with", QueryBuilderOperatorInterface::OPERATOR_NOT_BEGINS_WITH, "The constant OPERATOR_NOT_BEGINS_WITH does not return the expected value");
        $this->assertEquals("not_between", QueryBuilderOperatorInterface::OPERATOR_NOT_BETWEEN, "The constant OPERATOR_NOT_BETWEEN does not return the expected value");
        $this->assertEquals("not_contains", QueryBuilderOperatorInterface::OPERATOR_NOT_CONTAINS, "The constant OPERATOR_NOT_CONTAINS does not return the expected value");
        $this->assertEquals("not_ends_with", QueryBuilderOperatorInterface::OPERATOR_NOT_ENDS_WITH, "The constant OPERATOR_NOT_ENDS_WITH does not return the expected value");
        $this->assertEquals("not_equal", QueryBuilderOperatorInterface::OPERATOR_NOT_EQUAL, "The constant OPERATOR_NOT_EQUAL does not return the expected value");
        $this->assertEquals("not_in", QueryBuilderOperatorInterface::OPERATOR_NOT_IN, "The constant OPERATOR_NOT_IN does not return the expected value");

        $this->assertEquals("LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH], "The constant OPERATORS[OPERATOR_BEGINS_WITH] does not return the expected value");
        $this->assertEquals("BETWEEN", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_BETWEEN], "The constant OPERATORS[OPERATOR_BETWEEN] does not return the expected value");
        $this->assertEquals("LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_CONTAINS], "The constant OPERATORS[OPERATOR_CONTAINS] does not return the expected value");
        $this->assertEquals("LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_ENDS_WITH], "The constant OPERATORS[OPERATOR_ENDS_WITH] does not return the expected value");
        $this->assertEquals("=", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_EQUAL], "The constant OPERATORS[OPERATOR_EQUAL] does not return the expected value");
        $this->assertEquals(">", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_GREATER], "The constant OPERATORS[OPERATOR_GREATER] does not return the expected value");
        $this->assertEquals(">=", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_GREATER_OR_EQUAL], "The constant OPERATORS[OPERATOR_GREATER_OR_EQUAL] does not return the expected value");
        $this->assertEquals("IN", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IN], "The constant OPERATORS[OPERATOR_IN] does not return the expected value");
        $this->assertEquals("IS NULL", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IS_EMPTY], "The constant OPERATORS[OPERATOR_IS_EMPTY] does not return the expected value");
        $this->assertEquals("IS NOT NULL", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IS_NOT_EMPTY], "The constant OPERATORS[OPERATOR_IS_NOT_EMPTY] does not return the expected value");
        $this->assertEquals("IS NOT NULL", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IS_NOT_NULL], "The constant OPERATORS[OPERATOR_IS_NOT_NULL] does not return the expected value");
        $this->assertEquals("IS NULL", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IS_NULL], "The constant OPERATORS[OPERATOR_IS_NULL] does not return the expected value");
        $this->assertEquals("<", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_LESS], "The constant OPERATORS[OPERATOR_LESS] does not return the expected value");
        $this->assertEquals("<=", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_LESS_OR_EQUAL], "The constant OPERATORS[OPERATOR_LESS_OR_EQUAL] does not return the expected value");
        $this->assertEquals("NOT LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_BEGINS_WITH], "The constant OPERATORS[OPERATOR_NOT_BEGINS_WITH] does not return the expected value");
        $this->assertEquals("NOT BETWEEN", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_BETWEEN], "The constant OPERATORS[OPERATOR_NOT_BETWEEN] does not return the expected value");
        $this->assertEquals("NOT LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_CONTAINS], "The constant OPERATORS[OPERATOR_NOT_CONTAINS] does not return the expected value");
        $this->assertEquals("NOT LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_ENDS_WITH], "The constant OPERATORS[OPERATOR_NOT_ENDS_WITH] does not return the expected value");
        $this->assertEquals("<>", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_EQUAL], "The constant OPERATORS[OPERATOR_NOT_EQUAL] does not return the expected value");
        $this->assertEquals("NOT IN", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_IN], "The constant OPERATORS[OPERATOR_NOT_IN] does not return the expected value");
    }

}
