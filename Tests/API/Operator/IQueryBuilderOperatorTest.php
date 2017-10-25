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
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Operator\IQueryBuilderOperator;

/**
 * QueryBuilder operator interface test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API\Operator
 * @final
 */
final class IQueryBuilderOperatorTest extends PHPUnit_Framework_TestCase {

    /**
     * Test the __construct() method.
     *
     * @return void
     */
    public function testConstructor() {

        $this->assertEquals("begins_with", IQueryBuilderOperator::OPERATOR_BEGINS_WITH, "The constant OPERATOR_BEGINS_WITH does not return the expected value");
        $this->assertEquals("between", IQueryBuilderOperator::OPERATOR_BETWEEN, "The constant OPERATOR_BETWEEN does not return the expected value");
        $this->assertEquals("contains", IQueryBuilderOperator::OPERATOR_CONTAINS, "The constant OPERATOR_CONTAINS does not return the expected value");
        $this->assertEquals("ends_with", IQueryBuilderOperator::OPERATOR_ENDS_WITH, "The constant OPERATOR_ENDS_WITH does not return the expected value");
        $this->assertEquals("equal", IQueryBuilderOperator::OPERATOR_EQUAL, "The constant OPERATOR_EQUAL does not return the expected value");
        $this->assertEquals("greater", IQueryBuilderOperator::OPERATOR_GREATER, "The constant OPERATOR_GREATER does not return the expected value");
        $this->assertEquals("greater_or_equal", IQueryBuilderOperator::OPERATOR_GREATER_OR_EQUAL, "The constant OPERATOR_GREATER_OR_EQUAL does not return the expected value");
        $this->assertEquals("in", IQueryBuilderOperator::OPERATOR_IN, "The constant OPERATOR_IN does not return the expected value");
        $this->assertEquals("is_empty", IQueryBuilderOperator::OPERATOR_IS_EMPTY, "The constant OPERATOR_IS_EMPTY does not return the expected value");
        $this->assertEquals("is_not_empty", IQueryBuilderOperator::OPERATOR_IS_NOT_EMPTY, "The constant OPERATOR_IS_NOT_EMPTY does not return the expected value");
        $this->assertEquals("is_not_null", IQueryBuilderOperator::OPERATOR_IS_NOT_NULL, "The constant OPERATOR_IS_NOT_NULL does not return the expected value");
        $this->assertEquals("is_null", IQueryBuilderOperator::OPERATOR_IS_NULL, "The constant OPERATOR_IS_NULL does not return the expected value");
        $this->assertEquals("less", IQueryBuilderOperator::OPERATOR_LESS, "The constant OPERATOR_LESS does not return the expected value");
        $this->assertEquals("less_or_equal", IQueryBuilderOperator::OPERATOR_LESS_OR_EQUAL, "The constant OPERATOR_LESS_OR_EQUAL does not return the expected value");
        $this->assertEquals("not_begins_with", IQueryBuilderOperator::OPERATOR_NOT_BEGINS_WITH, "The constant OPERATOR_NOT_BEGINS_WITH does not return the expected value");
        $this->assertEquals("not_between", IQueryBuilderOperator::OPERATOR_NOT_BETWEEN, "The constant OPERATOR_NOT_BETWEEN does not return the expected value");
        $this->assertEquals("not_contains", IQueryBuilderOperator::OPERATOR_NOT_CONTAINS, "The constant OPERATOR_NOT_CONTAINS does not return the expected value");
        $this->assertEquals("not_ends_with", IQueryBuilderOperator::OPERATOR_NOT_ENDS_WITH, "The constant OPERATOR_NOT_ENDS_WITH does not return the expected value");
        $this->assertEquals("not_equal", IQueryBuilderOperator::OPERATOR_NOT_EQUAL, "The constant OPERATOR_NOT_EQUAL does not return the expected value");
        $this->assertEquals("not_in", IQueryBuilderOperator::OPERATOR_NOT_IN, "The constant OPERATOR_NOT_IN does not return the expected value");

        $this->assertEquals("LIKE", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_BEGINS_WITH], "The constant OPERATORS[OPERATOR_BEGINS_WITH] does not return the expected value");
        $this->assertEquals("BETWEEN", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_BETWEEN], "The constant OPERATORS[OPERATOR_BETWEEN] does not return the expected value");
        $this->assertEquals("LIKE", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_CONTAINS], "The constant OPERATORS[OPERATOR_CONTAINS] does not return the expected value");
        $this->assertEquals("LIKE", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_ENDS_WITH], "The constant OPERATORS[OPERATOR_ENDS_WITH] does not return the expected value");
        $this->assertEquals("=", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_EQUAL], "The constant OPERATORS[OPERATOR_EQUAL] does not return the expected value");
        $this->assertEquals(">", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_GREATER], "The constant OPERATORS[OPERATOR_GREATER] does not return the expected value");
        $this->assertEquals(">=", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_GREATER_OR_EQUAL], "The constant OPERATORS[OPERATOR_GREATER_OR_EQUAL] does not return the expected value");
        $this->assertEquals("IN", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_IN], "The constant OPERATORS[OPERATOR_IN] does not return the expected value");
        $this->assertEquals("IS NULL", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_IS_EMPTY], "The constant OPERATORS[OPERATOR_IS_EMPTY] does not return the expected value");
        $this->assertEquals("IS NOT NULL", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_IS_NOT_EMPTY], "The constant OPERATORS[OPERATOR_IS_NOT_EMPTY] does not return the expected value");
        $this->assertEquals("IS NOT NULL", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_IS_NOT_NULL], "The constant OPERATORS[OPERATOR_IS_NOT_NULL] does not return the expected value");
        $this->assertEquals("IS NULL", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_IS_NULL], "The constant OPERATORS[OPERATOR_IS_NULL] does not return the expected value");
        $this->assertEquals("<", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_LESS], "The constant OPERATORS[OPERATOR_LESS] does not return the expected value");
        $this->assertEquals("<=", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_LESS_OR_EQUAL], "The constant OPERATORS[OPERATOR_LESS_OR_EQUAL] does not return the expected value");
        $this->assertEquals("NOT LIKE", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_NOT_BEGINS_WITH], "The constant OPERATORS[OPERATOR_NOT_BEGINS_WITH] does not return the expected value");
        $this->assertEquals("NOT BETWEEN", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_NOT_BETWEEN], "The constant OPERATORS[OPERATOR_NOT_BETWEEN] does not return the expected value");
        $this->assertEquals("NOT LIKE", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_NOT_CONTAINS], "The constant OPERATORS[OPERATOR_NOT_CONTAINS] does not return the expected value");
        $this->assertEquals("NOT LIKE", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_NOT_ENDS_WITH], "The constant OPERATORS[OPERATOR_NOT_ENDS_WITH] does not return the expected value");
        $this->assertEquals("<>", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_NOT_EQUAL], "The constant OPERATORS[OPERATOR_NOT_EQUAL] does not return the expected value");
        $this->assertEquals("NOT IN", IQueryBuilderOperator::OPERATORS[IQueryBuilderOperator::OPERATOR_NOT_IN], "The constant OPERATORS[OPERATOR_NOT_IN] does not return the expected value");
    }

}
