<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Decorator;

use WBW\Bundle\JQuery\QueryBuilderBundle\Rule\QueryBuilderRule;

/**
 * jQuery QueryBuilder decorator interface.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator
 */
interface QueryBuilderDecoratorInterface {

    /**
     * Convert into a SQL string representing this jQuery QueryBuilder rule.
     *
     * @param QueryBuilderRule $queryBuilderRule The jQuery QueryBuilder rule.
     * @return string Returns a SQL string representing this jQuery QueryBuilder rule.
     */
    public function toSQL(QueryBuilderRule $queryBuilderRule);
}
