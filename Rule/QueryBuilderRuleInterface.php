<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Rule;

/**
 * jQuery QueryBuilder rule interface.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 */
interface QueryBuilderRuleInterface {

    /**
     * Convert into a SQL string representing this instance.
     *
     * @return string Returns a SQL string representing this instance.
     */
    public function toSQL();
}
