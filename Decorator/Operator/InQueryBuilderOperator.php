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

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type\ArrayQueryBuilderType;

/**
 * In QueryBuilder operator.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator
 */
class InQueryBuilderOperator extends AbstractQueryBuilderOperator {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::OPERATOR_IN);
    }

    /**
     * {@inheritdoc}
     */
    public function toSql(QueryBuilderRuleInterface $rule, bool $wrap = false): string {

        $qbt = new ArrayQueryBuilderType();
        $tmp = $qbt->toSql($rule, true);

        $sql = [
            parent::toSql($rule, $wrap),
            sprintf("(%s)", str_replace(self::DEFAULT_SEPARATOR, ", ", $tmp)),
        ];

        return implode(" ", $sql);
    }
}
