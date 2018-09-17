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

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractJQueryQueryBuilderFrameworkTestCase;

/**
 * jQuery QueryBuilder operator interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 * @final
 */
final class QueryBuilderOperatorInterfaceTest extends AbstractJQueryQueryBuilderFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("begins_with", QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH);
        $this->assertEquals("between", QueryBuilderOperatorInterface::OPERATOR_BETWEEN);
        $this->assertEquals("contains", QueryBuilderOperatorInterface::OPERATOR_CONTAINS);
        $this->assertEquals("ends_with", QueryBuilderOperatorInterface::OPERATOR_ENDS_WITH);
        $this->assertEquals("equal", QueryBuilderOperatorInterface::OPERATOR_EQUAL);
        $this->assertEquals("greater", QueryBuilderOperatorInterface::OPERATOR_GREATER);
        $this->assertEquals("greater_or_equal", QueryBuilderOperatorInterface::OPERATOR_GREATER_OR_EQUAL);
        $this->assertEquals("in", QueryBuilderOperatorInterface::OPERATOR_IN);
        $this->assertEquals("is_empty", QueryBuilderOperatorInterface::OPERATOR_IS_EMPTY);
        $this->assertEquals("is_not_empty", QueryBuilderOperatorInterface::OPERATOR_IS_NOT_EMPTY);
        $this->assertEquals("is_not_null", QueryBuilderOperatorInterface::OPERATOR_IS_NOT_NULL);
        $this->assertEquals("is_null", QueryBuilderOperatorInterface::OPERATOR_IS_NULL);
        $this->assertEquals("less", QueryBuilderOperatorInterface::OPERATOR_LESS);
        $this->assertEquals("less_or_equal", QueryBuilderOperatorInterface::OPERATOR_LESS_OR_EQUAL);
        $this->assertEquals("not_begins_with", QueryBuilderOperatorInterface::OPERATOR_NOT_BEGINS_WITH);
        $this->assertEquals("not_between", QueryBuilderOperatorInterface::OPERATOR_NOT_BETWEEN);
        $this->assertEquals("not_contains", QueryBuilderOperatorInterface::OPERATOR_NOT_CONTAINS);
        $this->assertEquals("not_ends_with", QueryBuilderOperatorInterface::OPERATOR_NOT_ENDS_WITH);
        $this->assertEquals("not_equal", QueryBuilderOperatorInterface::OPERATOR_NOT_EQUAL);
        $this->assertEquals("not_in", QueryBuilderOperatorInterface::OPERATOR_NOT_IN);

        $this->assertEquals("LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH]);
        $this->assertEquals("BETWEEN", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_BETWEEN]);
        $this->assertEquals("LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_CONTAINS]);
        $this->assertEquals("LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_ENDS_WITH]);
        $this->assertEquals("=", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_EQUAL]);
        $this->assertEquals(">", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_GREATER]);
        $this->assertEquals(">=", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_GREATER_OR_EQUAL]);
        $this->assertEquals("IN", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IN]);
        $this->assertEquals("IS NULL", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IS_EMPTY]);
        $this->assertEquals("IS NOT NULL", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IS_NOT_EMPTY]);
        $this->assertEquals("IS NOT NULL", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IS_NOT_NULL]);
        $this->assertEquals("IS NULL", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_IS_NULL]);
        $this->assertEquals("<", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_LESS]);
        $this->assertEquals("<=", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_LESS_OR_EQUAL]);
        $this->assertEquals("NOT LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_BEGINS_WITH]);
        $this->assertEquals("NOT BETWEEN", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_BETWEEN]);
        $this->assertEquals("NOT LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_CONTAINS]);
        $this->assertEquals("NOT LIKE", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_ENDS_WITH]);
        $this->assertEquals("<>", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_EQUAL]);
        $this->assertEquals("NOT IN", QueryBuilderOperatorInterface::OPERATORS[QueryBuilderOperatorInterface::OPERATOR_NOT_IN]);
    }

}
