<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Helper;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderEnumerator;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Library\Core\Argument\IntegerHelper;

/**
 * QueryBuilder repository helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Helper
 */
class QueryBuilderRepositoryHelper implements QueryBuilderConditionInterface, QueryBuilderOperatorInterface, QueryBuilderTypeInterface {

    /**
     * Convert a rule into a SQL string representation.
     *
     * @param QueryBuilderRuleInterface $rule The rule.
     * @return string Returns the SQL string representing the rule.
     */
    public static function queryBuilderRule2SQL(QueryBuilderRuleInterface $rule) {

        $sql   = [];
        $sql[] = $rule->getField();
        $sql[] = QueryBuilderEnumerator::enumOperators()[$rule->getOperator()];

        switch ($rule->getOperator()) {

            case self::OPERATOR_BEGINS_WITH:
            case self::OPERATOR_NOT_BEGINS_WITH:
                $sql[] = "'" . static::quoteMixedValue($rule->getType(), $rule->getValue(), false) . "%'";
                break;

            case self::OPERATOR_BETWEEN:
            case self::OPERATOR_NOT_BETWEEN:
                $sql[] = implode(" " . self::CONDITION_AND . " ", static::quoteArrayValue($rule->getType(), $rule->getValue(), true));
                break;

            case self::OPERATOR_CONTAINS:
            case self::OPERATOR_NOT_CONTAINS:
                $sql[] = "'%" . static::quoteMixedValue($rule->getType(), $rule->getValue(), false) . "%'";
                break;

            case self::OPERATOR_ENDS_WITH:
            case self::OPERATOR_NOT_ENDS_WITH:
                $sql[] = "'%" . static::quoteMixedValue($rule->getType(), $rule->getValue(), false) . "'";
                break;

            case self::OPERATOR_EQUAL:
            case self::OPERATOR_GREATER:
            case self::OPERATOR_GREATER_OR_EQUAL:
            case self::OPERATOR_LESS:
            case self::OPERATOR_LESS_OR_EQUAL:
            case self::OPERATOR_NOT_EQUAL:
                $sql[] = static::quoteMixedValue($rule->getType(), $rule->getValue(), true);
                break;

            case self::OPERATOR_IN:
            case self::OPERATOR_NOT_IN:
                $sql[] = "(" . implode(", ", static::quoteArrayValue($rule->getType(), $rule->getValue(), true)) . ")";
                break;

            case self::OPERATOR_IS_EMPTY:
            case self::OPERATOR_IS_NOT_EMPTY:
            case self::OPERATOR_IS_NOT_NULL:
            case self::OPERATOR_IS_NULL:
                // NOTHING TO DO.
                break;
        }

        return implode(" ", $sql);
    }

    /**
     * Convert a rule set into a SQL string representation.
     *
     * @param QueryBuilderRuleSetInterface $ruleSet The rule set.
     * @return string Returns the SQL string representing the rule set.
     */
    public static function queryBuilderRuleSet2SQL(QueryBuilderRuleSetInterface $ruleSet) {

        if (0 === count($ruleSet->getRules())) {
            return "";
        }

        $sql = [];

        foreach ($ruleSet->getRules() as $current) {

            if (true === ($current instanceof QueryBuilderRuleSetInterface)) {

                /** @var QueryBuilderRuleSetInterface $current */
                $sql[] = static::queryBuilderRuleSet2SQL($current);
                continue;
            }

            /** @var QueryBuilderRuleInterface $current */
            $sql[] = static::queryBuilderRule2SQL($current);
        }

        return "(" . implode(" " . $ruleSet->getCondition() . " ", $sql) . ")";
    }

    /**
     * Quote an array of values.
     *
     * @param string $type The type.
     * @param mixed $value The value.
     * @param bool $wrap Wrap ?
     * @return array Returns the quoted values.
     */
    protected static function quoteArrayValue($type, $value, $wrap = false) {
        $output = [];
        foreach ($value as $current) {
            $output[] = static::quoteMixedValue($type, $current, $wrap);
        }
        return $output;
    }

    /**
     * Quote a mixed value.
     *
     * @param string $type The type.
     * @param mixed $value The value.
     * @param bool $wrap Wrap ?
     * @return mixed|null Returns the quoted value in case of success, null otherwise.
     */
    protected static function quoteMixedValue($type, $value, $wrap = false) {

        $output = null;

        switch ($type) {

            case self::TYPE_BOOLEAN:
                $output = IntegerHelper::parseBoolean($value);
                break;

            case self::TYPE_DATE:
            case self::TYPE_DATETIME:
            case self::TYPE_STRING:
            case self::TYPE_TIME:
                $output = true === $wrap ? "'" . addslashes($value) . "'" : addslashes($value);
                break;

            case self::TYPE_DOUBLE:
            case self::TYPE_INTEGER:
                $output = $value;
                break;
        }

        return $output;
    }
}
