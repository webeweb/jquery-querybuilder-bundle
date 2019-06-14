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

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;

/**
 * Is empty QueryBuilder operator.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator
 */
class IsEmptyQueryBuilderOperator extends AbstractQueryBuilderOperator {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::OPERATOR_IS_EMPTY);
    }

    /**
     * {@inheritDoc}
     */
    public function toSQL(QueryBuilderRuleInterface $rule, $wrap = false) {
        return parent::toSQL($rule, $wrap);
    }
}