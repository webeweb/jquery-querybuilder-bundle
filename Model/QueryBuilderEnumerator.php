<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Model;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderTypeInterface;

/**
 * QueryBuilder enumerator.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Model
 */
class QueryBuilderEnumerator {

    /**
     * Enumerates the conditions.
     *
     * @return string[] Returns the conditions enumeration.
     */
    public static function enumConditions(): array {

        return [
            QueryBuilderConditionInterface::CONDITION_AND,
            QueryBuilderConditionInterface::CONDITION_OR,
        ];
    }

    /**
     * Enumerates the inputs.
     *
     * @return string[] Returns the inputs enumeration.
     */
    public static function enumInputs(): array {

        return [
            QueryBuilderInputInterface::INPUT_CHECKBOX,
            QueryBuilderInputInterface::INPUT_NUMBER,
            QueryBuilderInputInterface::INPUT_RADIO,
            QueryBuilderInputInterface::INPUT_SELECT,
            QueryBuilderInputInterface::INPUT_TEXT,
            QueryBuilderInputInterface::INPUT_TEXTAREA,
        ];
    }

    /**
     * Enumerates the operators.
     *
     * @return array Returns the operators enumeration.
     */
    public static function enumOperators(): array {

        return [
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
    }

    /**
     * Enumerates the types.
     *
     * @return string[] Returns the types enumeration.
     */
    public static function enumTypes(): array {

        return [
            QueryBuilderTypeInterface::TYPE_BOOLEAN,
            QueryBuilderTypeInterface::TYPE_DATE,
            QueryBuilderTypeInterface::TYPE_DATETIME,
            QueryBuilderTypeInterface::TYPE_DOUBLE,
            QueryBuilderTypeInterface::TYPE_INTEGER,
            QueryBuilderTypeInterface::TYPE_STRING,
            QueryBuilderTypeInterface::TYPE_TIME,
        ];
    }
}
