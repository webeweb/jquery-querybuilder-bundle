<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API;

use WBW\Bundle\JQuery\QueryBuilderBundle\Normalizer\QueryBuilderNormalizer;

/**
 * QueryBuilder validation.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
class QueryBuilderValidation implements QueryBuilderValidationInterface {

    /**
     * Allow empty value.
     *
     * @var bool
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
     * {@inheritDoc}
     */
    public function getAllowEmptyValue() {
        return $this->allowEmptyValue;
    }

    /**
     * {@inheritDoc}
     */
    public function getCallback() {
        return $this->callback;
    }

    /**
     * {@inheritDoc}
     */
    public function getFormat() {
        return $this->format;
    }

    /**
     * {@inheritDoc}
     */
    public function getMax() {
        return $this->max;
    }

    /**
     * {@inheritDoc}
     */
    public function getMessages() {
        return $this->messages;
    }

    /**
     * {@inheritDoc}
     */
    public function getMin() {
        return $this->min;
    }

    /**
     * {@inheritDoc}
     */
    public function getStep() {
        return $this->step;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return QueryBuilderNormalizer::normalizeQueryBuilderValidation($this);
    }

    /**
     * Set the allow empty value.
     *
     * @param bool $allowEmptyValue The allow empty value.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setAllowEmptyValue($allowEmptyValue) {
        $this->allowEmptyValue = $allowEmptyValue;
        return $this;
    }

    /**
     * Set the callback.
     *
     * @param string $callback The callback.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setCallback($callback) {
        $this->callback = $callback;
        return $this;
    }

    /**
     * Set the format.
     *
     * @param string|array $format The format.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setFormat($format) {
        $this->format = $format;
        return $this;
    }

    /**
     * Set the max.
     *
     * @param integer|float|string $max The max.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setMax($max) {
        $this->max = $max;
        return $this;
    }

    /**
     * Set the messages.
     *
     * @param array $messages The messages.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setMessages(array $messages) {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Set the min.
     *
     * @param integer|float|string $min The min.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setMin($min) {
        $this->min = $min;
        return $this;
    }

    /**
     * Set the step.
     *
     * @param integer|float $step The step.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setStep($step) {
        $this->step = $step;
        return $this;
    }
}
