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

use UnexpectedValueException;
use WBW\Library\Core\Argument\ArrayHelper;

/**
 * QueryBuilder filter.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
class QueryBuilderFilter extends AbstractQueryBuilder implements QueryBuilderFilterInterface, QueryBuilderOperatorInterface {

    /**
     * Label.
     *
     * @var string
     */
    private $label;

    /**
     * Multiple.
     *
     * @var bool
     */
    private $multiple;

    /**
     * Operators.
     *
     * @var array
     */
    private $operators;

    /**
     * Validation.
     *
     * @var QueryBuilderValidationInterface
     */
    private $validation;

    /**
     * Values.
     *
     * @var array
     */
    private $values;

    /**
     * Constructor.
     *
     * @param string $id The id.
     * @param string $type The type.
     * @param array $operators The operators.
     * @throws UnexpectedValueException Throws an unexpected value exception if an operator is invalid.
     */
    public function __construct($id, $type, array $operators) {
        parent::__construct();
        $this->setId($id);
        $this->setLabel("");
        $this->setMultiple(false);
        $this->setOperators($operators);
        $this->setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * {@inheritDoc}
     */
    public function getMultiple() {
        return $this->multiple;
    }

    /**
     * {@inheritDoc}
     */
    public function getOperators() {
        return $this->operators;
    }

    /**
     * {@inheritDoc}
     */
    public function getValidation() {
        return $this->validation;
    }

    /**
     * {@inheritDoc}
     */
    public function getValues() {
        return $this->values;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {

        $output = [];

        $output["id"] = $this->getId();

        ArrayHelper::set($output, "field", $this->getField(), [null]);

        $output["label"] = $this->getLabel();
        $output["type"]  = $this->getType();

        ArrayHelper::set($output, "input", $this->getInput(), [null]);
        ArrayHelper::set($output, "values", $this->getValues(), [null]);
        ArrayHelper::set($output, "multiple", $this->getMultiple(), [null, false]);

        if (null !== $this->getValues()) {
            $output["validation"] = $this->getValidation()->jsonSerialize();
        }
        $output["operators"] = $this->getOperators();

        return $output;
    }

    /**
     * Set the label.
     *
     * @param string $label The label.
     * @return QueryBuilderFilter Returns this filter.
     */
    public function setLabel($label) {
        $this->label = $label;
        return $this;
    }

    /**
     * Set the multiple.
     *
     * @param bool $multiple The multiple.
     * @return QueryBuilderFilter Returns this filter.
     */
    public function setMultiple($multiple) {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * Set the operators.
     *
     * @param array $operators The operators.
     * @return QueryBuilderFilterInterface Returns this filter.
     * @throws UnexpectedValueException Throws an unexpected value exception if an operator is invalid.
     */
    public function setOperators(array $operators) {
        foreach ($operators as $current) {
            if (false === array_key_exists($current, QueryBuilderEnumerator::enumOperators())) {
                throw new UnexpectedValueException("The operator \"" . $current . "\" is invalid");
            }
        }
        $this->operators = $operators;
        return $this;
    }

    /**
     * Set the validation.
     *
     * @param QueryBuilderValidationInterface|null $validation The validation.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setValidation(QueryBuilderValidationInterface $validation = null) {
        $this->validation = $validation;
        return $this;
    }

    /**
     * Set the values.
     *
     * @param array $values The values.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setValues(array $values) {
        $this->values = $values;
        return $this;
    }
}
