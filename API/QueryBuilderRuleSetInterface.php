<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API;

/**
 * QueryBuilder rule set interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
interface QueryBuilderRuleSetInterface {

    /**
     * Get the condition.
     *
     * @return string Returns the condition.
     */
    public function getCondition();

    /**
     * Get the rules.
     *
     * @return array Returns the rules.
     */
    public function getRules();

    /**
     * Get the valid.
     *
     * @return bool Returns the valid.
     */
    public function getValid();
}
