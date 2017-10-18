<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\JQuery\QueryBuilderBundle\API\Input;

/**
 * QueryBuilder input interface.
 *
 * @author WBW <https://github.com/webeweb/WBWJQueryQueryBuilderBundle>
 * @package WBW\JQuery\QueryBuilderBundle\API\Input
 * @version 2.4.3
 * @final
 */
interface IQueryBuilderInput {

    /**
     * Inputs.
     */
    const INPUTS = [
        self::INPUT_CHECKBOX => self::INPUT_CHECKBOX,
        self::INPUT_NUMBER   => self::INPUT_NUMBER,
        self::INPUT_RADIO    => self::INPUT_RADIO,
        self::INPUT_SELECT   => self::INPUT_SELECT,
        self::INPUT_TEXT     => self::INPUT_TEXT,
        self::INPUT_TEXTAREA => self::INPUT_TEXTAREA,
    ];

    /**
     * Input checkbox.
     */
    const INPUT_CHECKBOX = "checkbox";

    /**
     * Input number.
     */
    const INPUT_NUMBER = "number";

    /**
     * Input radio.
     */
    const INPUT_RADIO = "radio";

    /**
     * Input select.
     */
    const INPUT_SELECT = "select";

    /**
     * Input text.
     */
    const INPUT_TEXT = "text";

    /**
     * Input textarea.
     */
    const INPUT_TEXTAREA = "textarea";

}
