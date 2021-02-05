<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type\ArrayQueryBuilderType;

/**
 * Between QueryBuilder operator.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator
 */
class BetweenQueryBuilderOperator extends AbstractQueryBuilderOperator implements QueryBuilderConditionInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(static::OPERATOR_BETWEEN);
    }

    /**
     * {@inheritDoc}
     */
    public function toSql(QueryBuilderRuleInterface $rule, bool $wrap = false): string {

        $qbt = new ArrayQueryBuilderType();
        $tmp = $qbt->toSql($rule, true);

        $sql = [
            parent::toSql($rule, $wrap),
            str_replace("{{implode}}", " " . static::CONDITION_AND . " ", $tmp),
        ];

        return implode(" ", $sql);
    }
}
