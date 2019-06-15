<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API;

use InvalidArgumentException;

/**
 * QueryBuilder decorator interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
interface QueryBuilderDecoratorInterface {

    /**
     * Convert the rule into a SQL string representation.
     *
     * @param QueryBuilderRuleInterface $rule The rule.
     * @param bool $wrap Wrap ?
     * @return string|string[] Returns a SQL string representing the rule.
     * @throws InvalidArgumentException Throws an invalid argument exception if the type is invalid.
     */
    public function toSQL(QueryBuilderRuleInterface $rule, $wrap = false);
}
