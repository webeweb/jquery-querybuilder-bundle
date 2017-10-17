<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\JQuery\QueryBuilderBundle\API\Condition;

/**
 * QueryBuilder condition interface.
 *
 * @author WBW <https://github.com/webeweb/WBWJQueryQueryBuilderBundle>
 * @package WBW\JQuery\QueryBuilderBundle\API\Condition
 * @version 2.4.3
 * @final
 */
interface IQueryBuilderCondition {

    /**
     * Conditions.
     */
    const CONDITIONS = [
        self::CONDITION_AND => self::CONDITION_AND,
        self::CONDITION_OR  => self::CONDITION_OR,
    ];

    /**
     * Condition AND.
     */
    const CONDITION_AND = "AND";

    /**
     * Condition OR.
     */
    const CONDITION_OR = "OR";

}
