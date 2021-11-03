<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Api;

use JsonSerializable;

/**
 * QueryBuilder validation interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Api
 */
interface QueryBuilderValidationInterface extends JsonSerializable {

    /**
     * Get the allow empty value.
     *
     * @return bool|null Returns  the allow empty value.
     */
    public function getAllowEmptyValue(): ?bool;

    /**
     * Get the callback.
     *
     * @return string|null
     */
    public function getCallback(): ?string;

    /**
     * Get the format.
     *
     * @return mixed Returns the format.
     */
    public function getFormat();

    /**
     * Get the max.
     *
     * @return mixed Returns the max.
     */
    public function getMax();

    /**
     * Get the messages.
     *
     * @return array|null Returns the messages.
     */
    public function getMessages(): ?array;

    /**
     * Get the min.
     *
     * @return mixed Returns the min.
     */
    public function getMin();

    /**
     * Get the step.
     *
     * @return mixed Returns the step.
     */
    public function getStep();
}
