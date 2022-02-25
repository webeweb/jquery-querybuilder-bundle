<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Api;

/**
 * QueryBuilder operator interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Api
 */
interface QueryBuilderOperatorInterface {

    /**
     * Operator "begins with".
     *
     * @var string
     */
    const OPERATOR_BEGINS_WITH = "begins_with";

    /**
     * Operator "between".
     *
     * @var string
     */
    const OPERATOR_BETWEEN = "between";

    /**
     * Operator "contains".
     *
     * @var string
     */
    const OPERATOR_CONTAINS = "contains";

    /**
     * Operator "ends with".
     *
     * @var string
     */
    const OPERATOR_ENDS_WITH = "ends_with";

    /**
     * Operator "equal".
     *
     * @var string
     */
    const OPERATOR_EQUAL = "equal";

    /**
     * Operator "greater".
     *
     * @var string
     */
    const OPERATOR_GREATER = "greater";

    /**
     * Operator "greater or equal".
     *
     * @var string
     */
    const OPERATOR_GREATER_OR_EQUAL = "greater_or_equal";

    /**
     * Operator "in".
     *
     * @var string
     */
    const OPERATOR_IN = "in";

    /**
     * Operator "is empty".
     *
     * @var string
     */
    const OPERATOR_IS_EMPTY = "is_empty";

    /**
     * Operator "is not empty".
     *
     * @var string
     */
    const OPERATOR_IS_NOT_EMPTY = "is_not_empty";

    /**
     * Operator "is not null".
     *
     * @var string
     */
    const OPERATOR_IS_NOT_NULL = "is_not_null";

    /**
     * Operator "is null".
     *
     * @var string
     */
    const OPERATOR_IS_NULL = "is_null";

    /**
     * Operator "less".
     *
     * @var string
     */
    const OPERATOR_LESS = "less";

    /**
     * Operator "less or equal".
     *
     * @var string
     */
    const OPERATOR_LESS_OR_EQUAL = "less_or_equal";

    /**
     * Operator "not begins with".
     *
     * @var string
     */
    const OPERATOR_NOT_BEGINS_WITH = "not_begins_with";

    /**
     * Operator "not between".
     *
     * @var string
     */
    const OPERATOR_NOT_BETWEEN = "not_between";

    /**
     * Operator "not contains".
     *
     * @var string
     */
    const OPERATOR_NOT_CONTAINS = "not_contains";

    /**
     * Operator "not ends with".
     *
     * @var string
     */
    const OPERATOR_NOT_ENDS_WITH = "not_ends_with";

    /**
     * Operator "not_equal".
     *
     * @var string
     */
    const OPERATOR_NOT_EQUAL = "not_equal";

    /**
     * Operator "not in".
     *
     * @var string
     */
    const OPERATOR_NOT_IN = "not_in";
}
