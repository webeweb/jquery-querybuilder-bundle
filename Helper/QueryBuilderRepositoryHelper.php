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

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorFactory;

/**
 * QueryBuilder repository helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Helper
 */
class QueryBuilderRepositoryHelper implements QueryBuilderConditionInterface, QueryBuilderOperatorInterface, QueryBuilderTypeInterface {

    /**
     * Convert a rule into a SQL string representation.
     *
     * @param QueryBuilderRuleInterface $rule The rule.
     * @return string|null Returns the SQL string representing the rule.
     */
    public static function queryBuilderRule2Sql(QueryBuilderRuleInterface $rule): ?string {

        if (null !== $rule->getDecorator()) {
            return $rule->getDecorator()->toSql($rule, false);
        }

        $qbo = QueryBuilderDecoratorFactory::newQueryBuilderOperator($rule->getOperator());

        return $qbo->toSql($rule, false);
    }

    /**
     * Convert a rule set into a SQL string representation.
     *
     * @param QueryBuilderRuleSetInterface $ruleSet The rule set.
     * @return string Returns the SQL string representing the rule set.
     */
    public static function queryBuilderRuleSet2Sql(QueryBuilderRuleSetInterface $ruleSet): string {

        if (0 === count($ruleSet->getRules())) {
            return "";
        }

        $sql = [];

        foreach ($ruleSet->getRules() as $current) {

            if (true === ($current instanceof QueryBuilderRuleSetInterface)) {

                $sql[] = static::queryBuilderRuleSet2Sql($current);
                continue;
            }

            /** @var QueryBuilderRuleInterface $current */
            $sql[] = static::queryBuilderRule2Sql($current);
        }

        return "(" . implode(" " . $ruleSet->getCondition() . " ", $sql) . ")";
    }
}
