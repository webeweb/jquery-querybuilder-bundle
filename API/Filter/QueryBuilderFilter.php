<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API\Filter;

use JsonSerializable;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Operator\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Validation\QueryBuilderValidation;
use WBW\Bundle\JQuery\QueryBuilderBundle\Data\AbstractQueryBuilderData;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * jQuery QueryBuilder filter.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API\Filter
 */
class QueryBuilderFilter extends AbstractQueryBuilderData implements JsonSerializable, QueryBuilderOperatorInterface {

    /**
     * Label.
     *
     * @var string
     */
    private $label = "";

    /**
     * Multiple.
     *
     * @var boolean
     */
    private $multiple = false;

    /**
     * Operators.
     *
     * @var array
     */
    private $operators;

    /**
     * Validation.
     *
     * @var QueryBuilderValidation
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
     * @throws IllegalArgumentException Throws an illegal argument exception if an argument is invalid.
     */
    public function __construct($id, $type, array $operators) {
        parent::__construct($id, $type);
        $this->setOperators($operators);
    }

    /**
     * Get the label.
     *
     * @return Return the label.
     */
    public final function getLabel() {
        return $this->label;
    }

    /**
     * Get the multiple.
     *
     * @return boolean Returns the multiple.
     */
    public final function getMultiple() {
        return $this->multiple;
    }

    /**
     * Get the operators.
     *
     * @return array Returns the operators.
     */
    public final function getOperators() {
        return $this->operators;
    }

    /**
     * Get the validation.
     *
     * @return QueryBuilderValidation Returns the validation.
     */
    public final function getValidation() {
        return $this->validation;
    }

    /**
     * Get the values.
     *
     * @return array Returns the values.
     */
    public final function getValues() {
        return $this->values;
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
     * Set the label.
     *
     * @param string $label The label.
     * @return QueryBuilderFilter Returns the jQuery QueryBuilder filter.
     */
    public final function setLabel($label) {
        $this->label = $label;
        return $this;
    }

    /**
     * Set the multiple.
     *
     * @param boolean $multiple The multiple.
     * @return QueryBuilderFilter Returns the jQuery QueryBuilder filter.
     */
    public final function setMultiple($multiple = false) {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * Set the operators.
     *
     * @param array $operators The operators.
     * @return QueryBuilderFilter Returns the jQuery QueryBuilder filter.
     */
    public final function setOperators(array $operators = []) {
        foreach ($operators as $current) {
            if (array_key_exists($current, self::OPERATORS) === false) {
                throw new IllegalArgumentException("The operator \"" . $current . "\" is invalid");
            }
        }
        $this->operators = $operators;
        return $this;
    }

    /**
     * Set the validation.
     *
     * @param QueryBuilderValidation $validation The validation.
     * @return QueryBuilderFilter Returns the jQuery QueryBuilder filter.
     */
    public final function setValidation(QueryBuilderValidation $validation = null) {
        $this->validation = $validation;
        return $this;
    }

    /**
     * Set the values.
     *
     * @param array $values The values.
     * @return QueryBuilderFilter Returns the jQuery QueryBuilder filter.
     */
    public final function setValues(array $values = []) {
        $this->values = $values;
        return $this;
    }

    /**
     * Convert into an array representing this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public final function toArray() {

        // Initialiaze the output.
        $output = [];

        $output["id"] = $this->getId();

        if (!is_null($this->getField())) {
            $output["field"] = $this->getField();
        }

        $output["label"] = $this->label;
        $output["type"]  = $this->getType();

        if (!is_null($this->getInput())) {
            $output["input"] = $this->getInput();
        }

        if (!is_null($this->values)) {
            $output["values"] = $this->values;
        }

        if (!is_null($this->multiple) && $this->multiple !== false) {
            $output["multiple"] = $this->multiple;
        }

        if (!is_null($this->validation)) {
            $output["validation"] = $this->validation->toArray();
        }

        $output["operators"] = $this->operators;

        // Return the output.
        return $output;
    }

}
