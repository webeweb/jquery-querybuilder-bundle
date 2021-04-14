<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderEnumerator;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder enumerator test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Model
 */
class QueryBuilderEnumeratorTest extends AbstractTestCase {

    /**
     * Tests the enumConditions() method.
     *
     * @return void
     */
    public function testEnumConditions(): void {

        $res = [
            QueryBuilderConditionInterface::CONDITION_AND,
            QueryBuilderConditionInterface::CONDITION_OR,

        ];

        $this->assertEquals($res, QueryBuilderEnumerator::enumConditions());
    }

    /**
     * Tests the enumInputs() method.
     *
     * @return void
     */
    public function testEnumInputs(): void {

        $res = [
            QueryBuilderInputInterface::INPUT_CHECKBOX,
            QueryBuilderInputInterface::INPUT_NUMBER,
            QueryBuilderInputInterface::INPUT_RADIO,
            QueryBuilderInputInterface::INPUT_SELECT,
            QueryBuilderInputInterface::INPUT_TEXT,
            QueryBuilderInputInterface::INPUT_TEXTAREA,
        ];

        $this->assertEquals($res, QueryBuilderEnumerator::enumInputs());
    }

    /**
     * Tests the enumOperators() method.
     *
     * @return void
     */
    public function testEnumOperators(): void {

        $res = [
            QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH      => "LIKE",
            QueryBuilderOperatorInterface::OPERATOR_BETWEEN          => "BETWEEN",
            QueryBuilderOperatorInterface::OPERATOR_CONTAINS         => "LIKE",
            QueryBuilderOperatorInterface::OPERATOR_ENDS_WITH        => "LIKE",
            QueryBuilderOperatorInterface::OPERATOR_EQUAL            => "=",
            QueryBuilderOperatorInterface::OPERATOR_GREATER          => ">",
            QueryBuilderOperatorInterface::OPERATOR_GREATER_OR_EQUAL => ">=",
            QueryBuilderOperatorInterface::OPERATOR_IN               => "IN",
            QueryBuilderOperatorInterface::OPERATOR_IS_EMPTY         => "IS NULL",
            QueryBuilderOperatorInterface::OPERATOR_IS_NOT_EMPTY     => "IS NOT NULL",
            QueryBuilderOperatorInterface::OPERATOR_IS_NOT_NULL      => "IS NOT NULL",
            QueryBuilderOperatorInterface::OPERATOR_IS_NULL          => "IS NULL",
            QueryBuilderOperatorInterface::OPERATOR_LESS             => "<",
            QueryBuilderOperatorInterface::OPERATOR_LESS_OR_EQUAL    => "<=",
            QueryBuilderOperatorInterface::OPERATOR_NOT_BEGINS_WITH  => "NOT LIKE",
            QueryBuilderOperatorInterface::OPERATOR_NOT_BETWEEN      => "NOT BETWEEN",
            QueryBuilderOperatorInterface::OPERATOR_NOT_CONTAINS     => "NOT LIKE",
            QueryBuilderOperatorInterface::OPERATOR_NOT_ENDS_WITH    => "NOT LIKE",
            QueryBuilderOperatorInterface::OPERATOR_NOT_EQUAL        => "<>",
            QueryBuilderOperatorInterface::OPERATOR_NOT_IN           => "NOT IN",
        ];

        $this->assertEquals($res, QueryBuilderEnumerator::enumOperators());
    }

    /**
     * Tests the enumTypes() method.
     *
     * @return void
     */
    public function testEnumTypes(): void {

        $res = [
            QueryBuilderTypeInterface::TYPE_BOOLEAN,
            QueryBuilderTypeInterface::TYPE_DATE,
            QueryBuilderTypeInterface::TYPE_DATETIME,
            QueryBuilderTypeInterface::TYPE_DOUBLE,
            QueryBuilderTypeInterface::TYPE_INTEGER,
            QueryBuilderTypeInterface::TYPE_STRING,
            QueryBuilderTypeInterface::TYPE_TIME,
        ];

        $this->assertEquals($res, QueryBuilderEnumerator::enumTypes());
    }
}
