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

use JsonSerializable;

/**
 * QueryBuilder validation interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
interface QueryBuilderValidationInterface extends JsonSerializable {

    /**
     * Get the allow empty value.
     *
     * @return bool Returns  the allow empty value.
     */
    public function getAllowEmptyValue();

    /**
     * Get the callback.
     *
     * @return string
     */
    public function getCallback();

    /**
     * Get the format.
     *
     * @return string|array Returns the format.
     */
    public function getFormat();

    /**
     * Get the max.
     *
     * @return integer|float|string Returns the max.
     */
    public function getMax();

    /**
     * Get the messages.
     *
     * @return array Returns the messages.
     */
    public function getMessages();

    /**
     * Get the min.
     *
     * @return integer|float|string Returns the min.
     */
    public function getMin();

    /**
     * Get the step.
     *
     * @return integer|float Returns the step.
     */
    public function getStep();
}
