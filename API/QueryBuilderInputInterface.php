<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API;

/**
 * jQuery QueryBuilder input interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
interface QueryBuilderInputInterface {

    /**
     * Inputs.
     *
     * @var array
     */
    const INPUTS = [
        self::INPUT_CHECKBOX,
        self::INPUT_NUMBER,
        self::INPUT_RADIO,
        self::INPUT_SELECT,
        self::INPUT_TEXT,
        self::INPUT_TEXTAREA,
    ];

    /**
     * Input checkbox.
     *
     * @var string
     */
    const INPUT_CHECKBOX = "checkbox";

    /**
     * Input number.
     *
     * @var string
     */
    const INPUT_NUMBER = "number";

    /**
     * Input radio.
     *
     * @var string
     */
    const INPUT_RADIO = "radio";

    /**
     * Input select.
     *
     * @var string
     */
    const INPUT_SELECT = "select";

    /**
     * Input text.
     *
     * @var string
     */
    const INPUT_TEXT = "text";

    /**
     * Input textarea.
     *
     * @var string
     */
    const INPUT_TEXTAREA = "textarea";

}