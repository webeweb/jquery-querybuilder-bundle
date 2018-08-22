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

use JsonSerializable;
use WBW\Library\Core\Argument\ArrayHelper;

/**
 * jQuery QueryBuilder validation.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
class QueryBuilderValidation implements JsonSerializable {

    /**
     * Allow empty value.
     *
     * @var boolean
     */
    private $allowEmptyValue;

    /**
     * Callback.
     *
     * @var string
     */
    private $callback;

    /**
     * Format.
     *
     * @var string|array
     */
    private $format;

    /**
     * Max.
     *
     * @var integer|float|string
     */
    private $max;

    /**
     * Messages.
     *
     * @var array
     */
    private $messages;

    /**
     * Min.
     *
     * @var integer|float|string
     */
    private $min;

    /**
     * Step.
     *
     * @var integer|float
     */
    private $step;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the allow empty value.
     *
     * @return boolean Returns  the allow empty value.
     */
    public function getAllowEmptyValue() {
        return $this->allowEmptyValue;
    }

    /**
     * Get the callback.
     *
     * @return string
     */
    public function getCallback() {
        return $this->callback;
    }

    /**
     * Get the format.
     *
     * @return string|array Returns the dormat.
     */
    public function getFormat() {
        return $this->format;
    }

    /**
     * Get the max.
     *
     * @return integer|float|string Returns the max.
     */
    public function getMax() {
        return $this->max;
    }

    /**
     * Get the messages.
     *
     * @return array Returns the messages.
     */
    public function getMessages() {
        return $this->messages;
    }

    /**
     * Get the min.
     *
     * @return integer|float|string Returns the min.
     */
    public function getMin() {
        return $this->min;
    }

    /**
     * Get the step.
     *
     * @return integer|float Returns the step/
     */
    public function getStep() {
        return $this->step;
    }

    /**
     * Serialize this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function jsonSerialize() {
        return $this->toArray();
    }

    /**
     * Set the allow empty value.
     *
     * @param boolean $allowEmptyValue The allow empty value.
     * @return QueryBuilderValidation Returns this jQuery QueryBuilder validation.
     */
    public function setAllowEmptyValue($allowEmptyValue) {
        $this->allowEmptyValue = $allowEmptyValue;
        return $this;
    }

    /**
     * Set the callback.
     *
     * @param string $callback The callback.
     * @return QueryBuilderValidation Returns this jQuery QueryBuilder validation.
     */
    public function setCallback($callback) {
        $this->callback = $callback;
        return $this;
    }

    /**
     * Set the format.
     *
     * @param string|array $format The format.
     * @return QueryBuilderValidation Returns this jQuery QueryBuilder validation.
     */
    public function setFormat($format) {
        $this->format = $format;
        return $this;
    }

    /**
     * Set the max.
     *
     * @param integer|float|string $max The max.
     * @return QueryBuilderValidation Returns this jQuery QueryBuilder validation.
     */
    public function setMax($max) {
        $this->max = $max;
        return $this;
    }

    /**
     * Set the messages.
     *
     * @param array $messages The messages.
     * @return QueryBuilderValidation Returns this jQuery QueryBuilder validation.
     */
    public function setMessages(array $messages = []) {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Set the min.
     *
     * @param integer|float|string $min The min.
     * @return QueryBuilderValidation Returns this jQuery QueryBuilder validation.
     */
    public function setMin($min) {
        $this->min = $min;
        return $this;
    }

    /**
     * Set the step.
     *
     * @param integer|float $step The step.
     * @return QueryBuilderValidation Returns this jQuery QueryBuilder validation.
     */
    public function setStep($step) {
        $this->step = $step;
        return $this;
    }

    /**
     * Convert into an array representing this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function toArray() {

        // Initialize the output.
        $output = [];

        ArrayHelper::set($output, "format", $this->format, [null]);
        ArrayHelper::set($output, "min", $this->min, [null]);
        ArrayHelper::set($output, "max", $this->max, [null]);
        ArrayHelper::set($output, "step", $this->step, [null]);
        ArrayHelper::set($output, "messages", $this->messages, [null]);
        ArrayHelper::set($output, "allow_empty_value", $this->allowEmptyValue, [null]);
        ArrayHelper::set($output, "callback", $this->callback, [null]);

        // Return the output.
        return $output;
    }

}
