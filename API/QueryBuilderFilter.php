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
use WBW\Bundle\JQuery\QueryBuilderBundle\Data\AbstractQueryBuilderData;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;
use WBW\Library\Core\Helper\Argument\ArrayHelper;

/**
 * jQuery QueryBuilder filter.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
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
    public function getLabel() {
        return $this->label;
    }

    /**
     * Get the multiple.
     *
     * @return boolean Returns the multiple.
     */
    public function getMultiple() {
        return $this->multiple;
    }

    /**
     * Get the operators.
     *
     * @return array Returns the operators.
     */
    public function getOperators() {
        return $this->operators;
    }

    /**
     * Get the validation.
     *
     * @return QueryBuilderValidation Returns the validation.
     */
    public function getValidation() {
        return $this->validation;
    }

    /**
     * Get the values.
     *
     * @return array Returns the values.
     */
    public function getValues() {
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
     * @return QueryBuilderFilter Returns this jQuery QueryBuilder filter.
     */
    public function setLabel($label) {
        $this->label = $label;
        return $this;
    }

    /**
     * Set the multiple.
     *
     * @param boolean $multiple The multiple.
     * @return QueryBuilderFilter Returns this jQuery QueryBuilder filter.
     */
    public function setMultiple($multiple = false) {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * Set the operators.
     *
     * @param array $operators The operators.
     * @return QueryBuilderFilter Returns this jQuery QueryBuilder filter.
     */
    public function setOperators(array $operators = []) {
        foreach ($operators as $current) {
            if (false === array_key_exists($current, self::OPERATORS)) {
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
     * @return QueryBuilderFilter Returns this jQuery QueryBuilder filter.
     */
    public function setValidation(QueryBuilderValidation $validation = null) {
        $this->validation = $validation;
        return $this;
    }

    /**
     * Set the values.
     *
     * @param array $values The values.
     * @return QueryBuilderFilter Returns this jQuery QueryBuilder filter.
     */
    public function setValues(array $values = []) {
        $this->values = $values;
        return $this;
    }

    /**
     * Convert into an array representing this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function toArray() {

        // Initialiaze the output.
        $output = [];

        $output["id"] = $this->getId();

        ArrayHelper::set($output, "field", $this->getField(), [null]);

        $output["label"] = $this->label;
        $output["type"]  = $this->getType();

        ArrayHelper::set($output, "input", $this->getInput(), [null]);
        ArrayHelper::set($output, "values", $this->values, [null]);
        ArrayHelper::set($output, "multiple", $this->multiple, [null, false]);

        if (null !== $this->validation) {
            $output["validation"] = $this->validation->toArray();
        }
        $output["operators"] = $this->operators;

        // Return the output.
        return $output;
    }

}
