<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Rule;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\Condition\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Operator\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Data\AbstractQueryBuilderData;

/**
 * jQuery QueryBuilder rule.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 * @final
 */
final class QueryBuilderRule extends AbstractQueryBuilderData implements QueryBuilderConditionInterface, QueryBuilderOperatorInterface, QueryBuilderRuleInterface {

    /**
     * Decorator.
     *
     * @var QueryBuilderDecoratorInterface
     */
    private $decorator;

    /**
     * Operator.
     *
     * @var string
     */
    private $operator;

    /**
     * Value.
     *
     * @var mixed
     */
    private $value;

    /**
     * Constructor.
     *
     * @param array $rule The rule.
     * @param QueryBuilderDecoratorInterface The QueryBuilder decorator.
     */
    public function __construct(array $rule = [], QueryBuilderDecoratorInterface $decorator = null) {
        parent::__construct();
        $this->decorator = $decorator;
        $this->parse($rule);
    }

    /**
     * Get the QueryBuilder decorator.
     *
     * @return string Returns the QueryBuilder decorator.
     */
    public final function getDecorator() {
        return $this->decorator;
    }

    /**
     * Get the operator.
     *
     * @return string Returns the operator.
     */
    public final function getOperator() {
        return $this->operator;
    }

    /**
     * Get the value.
     *
     * @return mixed Returns the value.
     */
    public final function getValue() {
        return $this->value;
    }

    /**
     * Parse.
     *
     * @param array $rule The rule.
     */
    private function parse(array $rule = []) {
        if (array_key_exists("id", $rule)) {
            $this->setId($rule["id"]);
        }
        if (array_key_exists("field", $rule)) {
            $this->setField($rule["field"]);
        }
        if (array_key_exists("input", $rule)) {
            $this->setInput($rule["input"]);
        }
        if (array_key_exists("operator", $rule)) {
            $this->setOperator($rule["operator"]);
        }
        if (array_key_exists("type", $rule)) {
            $this->setType($rule["type"]);
        }
        if (array_key_exists("value", $rule)) {
            $this->setValue($rule["value"]);
        }
    }

    /**
     * Quote.
     *
     * @param mixed $values The values.
     * @return string Returns the values quoted.
     */
    private function quote($values) {

        // Declare the utility function.
        $quoteFunction = function($str, $type) {
            $search  = ["'"];
            $replace = ["''"];
            $quoted  = str_replace($search, $replace, $str);
            switch ($type) {
                case self::TYPE_DATE:
                    break;
                case self::TYPE_DATETIME:
                    break;
                case self::TYPE_STRING:
                    return "'" . $quoted . "'";
                case self::TYPE_TIME:
                    break;
            }
            return $quoted;
        };

        // Check the values.
        if (!is_array($values)) {
            return $quoteFunction($values, $this->getType());
        } else {
            $output = [];
            foreach ($values as $current) {
                $output[] = $quoteFunction($current, $this->getType());
            }
            return $output;
        }
    }

    /**
     * Set the operator.
     *
     * @param string $operator The operator.
     * @return QueryBuilderRule Returns the QueryBuilder rule.
     */
    public final function setOperator($operator) {
        if (array_key_exists($operator, self::OPERATORS)) {
            $this->operator = $operator;
        }
        return $this;
    }

    /**
     * Set the value.
     *
     * @param mixed $value The value.
     * @return QueryBuilderRule Returns the QueryBuilder rule.
     */
    public final function setValue($value) {
        $this->value = $value;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toSQL() {

        // Check the decorator.
        if (!is_null($this->_decorator)) {
            return $this->_decorator->toSQL($this);
        }

        $sql = [];

        // Add the field.
        $sql[] = $this->getField();

        // Add the operator.
        $sql[] = self::OPERATORS[$this->operator];

        // Switch into operator.
        switch ($this->operator) {

            case self::OPERATOR_BEGINS_WITH:
            case self::OPERATOR_NOT_BEGINS_WITH:
                $sql[] = "'" . $this->quote($this->value, $this->getType()) . "%'";
                break;

            case self::OPERATOR_BETWEEN:
            case self::OPERATOR_NOT_BETWEEN:
                $sql[] = "(" . implode(" " . self::CONDITION_AND . " ", $this->quote($this->value)) . ")";
                break;

            case self::OPERATOR_CONTAINS:
            case self::OPERATOR_NOT_CONTAINS:
                $sql[] = "'%" . $this->quote($this->value) . "%'";
                break;

            case self::OPERATOR_ENDS_WITH:
            case self::OPERATOR_NOT_ENDS_WITH:
                $sql[] = "'%" . $this->quote($this->value) . "'";
                break;

            case self::OPERATOR_IN:
            case self::OPERATOR_NOT_IN:
                $sql[] = "(" . implode(", ", $this->quote($this->value)) . ")";
                break;

            case self::OPERATOR_IS_EMPTY:
            case self::OPERATOR_IS_NOT_EMPTY:
            case self::OPERATOR_IS_NOT_NULL:
            case self::OPERATOR_IS_NULL:
                break;
        }

        // Return the SQL.
        return implode(" ", $sql);
    }

}
