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
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorFactory;

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

        if (null !== $rule->getDecorator()) {
            return $rule->getDecorator()->toSQL($rule, false);
        }

        $qbo = QueryBuilderDecoratorFactory::newQueryBuilderOperator($rule->getOperator());

        return $qbo->toSQL($rule, false);
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
}
