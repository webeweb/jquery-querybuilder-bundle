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
 * QueryBuilder type interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Api
 */
interface QueryBuilderTypeInterface {

    /**
     * Type "boolean".
     *
     * @var string
     */
    const TYPE_BOOLEAN = "boolean";

    /**
     * Type "date".
     *
     * @var string
     */
    const TYPE_DATE = "date";

    /**
     * Type "datetime".
     *
     * @var string
     */
    const TYPE_DATETIME = "datetime";

    /**
     * Type "double".
     *
     * @var string
     */
    const TYPE_DOUBLE = "double";

    /**
     * Type "integer".
     *
     * @var string
     */
    const TYPE_INTEGER = "integer";

    /**
     * Type "string".
     *
     * @var string
     */
    const TYPE_STRING = "string";

    /**
     * Type "time".
     *
     * @var string
     */
    const TYPE_TIME = "time";
}
