<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Decorator;

use WBW\Bundle\JQuery\QueryBuilderBundle\Rule\QueryBuilderRule;

/**
 * jQuery QueryBuilder decorator interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator
 */
interface QueryBuilderDecoratorInterface {

    /**
     * Convert into a SQL string representing this rule.
     *
     * @param QueryBuilderRule $queryBuilderRule The rule.
     * @return string Returns a SQL string representing this rule.
     */
    public function toSQL(QueryBuilderRule $queryBuilderRule);
}
