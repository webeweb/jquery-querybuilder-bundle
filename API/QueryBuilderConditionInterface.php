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

/**
 * QueryBuilder condition interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
interface QueryBuilderConditionInterface {

    /**
     * Condition "AND".
     *
     * @var string
     */
    const CONDITION_AND = "AND";

    /**
     * Condition "OR".
     *
     * @var string
     */
    const CONDITION_OR = "OR";
}
