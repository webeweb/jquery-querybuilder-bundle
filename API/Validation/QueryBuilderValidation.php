<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\JQuery\QueryBuilderBundle\API\Validation;

use JsonSerializable;

/**
 * jQuery QueryBuilder validation.
 *
 * @author WBW <https://github.com/webeweb/WBWJQueryQueryBuilderBundle>
 * @package WBW\JQuery\QueryBuilderBundle\API\Validation
 * @version 2.4.3
 * @final
 */
final class QueryBuilderValidation implements JsonSerializable {

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
     * @return QueryBuilderValidation Returns the QueryBuilder validation.
     */
    public function setAllowEmptyValue($allowEmptyValue) {
        $this->allowEmptyValue = $allowEmptyValue;
        return $this;
    }

    /**
     * Set the callback.
     *
     * @param string $callback The callback.
     * @return QueryBuilderValidation Returns the QueryBuilder validation.
     */
    public function setCallback($callback) {
        $this->callback = $callback;
        return $this;
    }

    /**
     * Set the format.
     *
     * @param string|array $format The format.
     * @return QueryBuilderValidation Returns the QueryBuilder validation.
     */
    public function setFormat($format) {
        $this->format = $format;
        return $this;
    }

    /**
     * Set the max.
     *
     * @param integer|float|string $max The max.
     * @return QueryBuilderValidation Returns the QueryBuilder validation.
     */
    public function setMax($max) {
        $this->max = $max;
        return $this;
    }

    /**
     * Set the messages.
     *
     * @param array $messages The messages.
     * @return QueryBuilderValidation Returns the QueryBuilder validation.
     */
    public function setMessages(array $messages = []) {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Set the min.
     *
     * @param integer|float|string $min The min.
     * @return QueryBuilderValidation Returns the QueryBuilder validation.
     */
    public function setMin($min) {
        $this->min = $min;
        return $this;
    }

    /**
     * Set the step.
     *
     * @param integer|float $step The step.
     * @return QueryBuilderValidation Returns the QueryBuilder validation.
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

        // Check the format.
        if (!is_null($this->format)) {
            $output["format"] = $this->format;
        }

        // Check the min.
        if (!is_null($this->min)) {
            $output["min"] = $this->min;
        }

        // Check the max.
        if (!is_null($this->max)) {
            $output["max"] = $this->max;
        }

        // Check the step.
        if (!is_null($this->step)) {
            $output["step"] = $this->step;
        }

        // Check the messages.
        if (!is_null($this->messages)) {
            $output["messages"] = $this->messages;
        }

        // Check the allow empty value.
        if (!is_null($this->allowEmptyValue)) {
            $output["allow_empty_value"] = $this->allowEmptyValue;
        }

        // Check the callback.
        if (!is_null($this->callback)) {
            $output["callback"] = $this->callback;
        }

        // Return the output.
        return $output;
    }

}
