<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\Decorator\Operator;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator\AbstractQueryBuilderOperator;

/**
 * Test QueryBuilder operator.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\Decorator\Operator
 */
class TestQueryBuilderOperator extends AbstractQueryBuilderOperator {

    /**
     * {@inheritDoc}
     */
    public function __construct($operator) {
        parent::__construct($operator);
    }

    /**
     * {@inheritDoc}
     */
    public function toSql(QueryBuilderRuleInterface $rule, bool $wrap = false): string {
        return "";
    }
}
