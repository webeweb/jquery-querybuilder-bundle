<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Model;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderValidationInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Serializer\JsonSerializer;

/**
 * QueryBuilder validation.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Model
 */
class QueryBuilderValidation implements QueryBuilderValidationInterface {

    /**
     * Allow empty value.
     *
     * @var bool|null
     */
    private $allowEmptyValue;

    /**
     * Callback.
     *
     * @var string|null
     */
    private $callback;

    /**
     * Format.
     *
     * @var mixed
     */
    private $format;

    /**
     * Max.
     *
     * @var mixed
     */
    private $max;

    /**
     * Messages.
     *
     * @var array|null
     */
    private $messages;

    /**
     * Min.
     *
     * @var mixed
     */
    private $min;

    /**
     * Step.
     *
     * @var mixed
     */
    private $step;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }

    /**
     * {@inheritDoc}
     */
    public function getAllowEmptyValue(): ?bool {
        return $this->allowEmptyValue;
    }

    /**
     * {@inheritDoc}
     */
    public function getCallback(): ?string {
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
    public function getMessages(): ?array {
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
    public function jsonSerialize(): array {
        return JsonSerializer::serializeQueryBuilderValidation($this);
    }

    /**
     * Set the allow empty value.
     *
     * @param bool|null $allowEmptyValue The allow empty value.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setAllowEmptyValue(?bool $allowEmptyValue): QueryBuilderValidationInterface {
        $this->allowEmptyValue = $allowEmptyValue;
        return $this;
    }

    /**
     * Set the callback.
     *
     * @param string|null $callback The callback.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setCallback(?string $callback): QueryBuilderValidationInterface {
        $this->callback = $callback;
        return $this;
    }

    /**
     * Set the format.
     *
     * @param mixed $format The format.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setFormat($format): QueryBuilderValidationInterface {
        $this->format = $format;
        return $this;
    }

    /**
     * Set the max.
     *
     * @param mixed $max The max.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setMax($max): QueryBuilderValidationInterface {
        $this->max = $max;
        return $this;
    }

    /**
     * Set the messages.
     *
     * @param array|null $messages The messages.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setMessages(?array $messages): QueryBuilderValidationInterface {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Set the min.
     *
     * @param mixed $min The min.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setMin($min): QueryBuilderValidationInterface {
        $this->min = $min;
        return $this;
    }

    /**
     * Set the step.
     *
     * @param mixed $step The step.
     * @return QueryBuilderValidationInterface Returns this validation.
     */
    public function setStep($step): QueryBuilderValidationInterface {
        $this->step = $step;
        return $this;
    }
}
