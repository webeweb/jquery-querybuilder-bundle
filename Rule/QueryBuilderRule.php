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
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorInterface;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

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
	 * @throws IllegalArgumentException Throws an illegal argument exception if an argument is invalid.
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
	 * @throws IllegalArgumentException Throws an illegal argument exception if an argument is invalid.
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
	 * Quote an array of values.
	 *
	 * @param array $values The values.
	 * @param boolean $wrap Wrap ?
	 * @return array Returns the quoted values.
	 */
	private function quoteArray(array $values, $wrap = false) {
		$output = [];
		foreach ($values as $current) {
			$output[] = $this->quoteMixed($current, $wrap);
		}
		return $output;
	}

	/**
	 * Quote a mixed value.
	 *
	 * @param mixed $value The value.
	 * @param boolean $wrap Wrap ?
	 * @return string Returns the quoted value.
	 */
	private function quoteMixed($value, $wrap = false) {
		$output = null;
		switch ($this->getType()) {
			case self::TYPE_BOOLEAN:
				$output	 = $value === true ? "1" : "0";
				break;
			case self::TYPE_DATE:
			case self::TYPE_DATETIME:
			case self::TYPE_STRING:
			case self::TYPE_TIME:
				$output	 = $wrap === true ? "'" . addslashes($value) . "'" : addslashes($value);
				break;
			case self::TYPE_DOUBLE:
			case self::TYPE_INTEGER:
				$output	 = $value;
				break;
		}
		return $output;
	}

	/**
	 * Set the operator.
	 *
	 * @param string $operator The operator.
	 * @return QueryBuilderRule Returns the QueryBuilder rule.
	 * @throws IllegalArgumentException Thwrows an illegal argument exception if the operator is invalid.
	 */
	public final function setOperator($operator) {
		if (array_key_exists($operator, self::OPERATORS) === false) {
			throw new IllegalArgumentException("The operator \"" . $operator . "\" is invalid");
		}
		$this->operator = $operator;
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
		if (!is_null($this->decorator)) {
			return $this->decorator->toSQL($this);
		}

		// Initialize the SQL.
		$sql	 = [];
		$sql[]	 = $this->getField();
		$sql[]	 = self::OPERATORS[$this->operator];

		// Switch into operator.
		switch ($this->operator) {

			case self::OPERATOR_BEGINS_WITH:
			case self::OPERATOR_NOT_BEGINS_WITH:
				$sql[] = "'" . $this->quoteMixed($this->value, false) . "%'";
				break;

			case self::OPERATOR_BETWEEN:
			case self::OPERATOR_NOT_BETWEEN:
				$sql[] = implode(" " . self::CONDITION_AND . " ", $this->quoteArray($this->value, true));
				break;

			case self::OPERATOR_CONTAINS:
			case self::OPERATOR_NOT_CONTAINS:
				$sql[] = "'%" . $this->quoteMixed($this->value, false) . "%'";
				break;

			case self::OPERATOR_ENDS_WITH:
			case self::OPERATOR_NOT_ENDS_WITH:
				$sql[] = "'%" . $this->quoteMixed($this->value, false) . "'";
				break;

			case self::OPERATOR_EQUAL:
			case self::OPERATOR_GREATER:
			case self::OPERATOR_GREATER_OR_EQUAL:
			case self::OPERATOR_LESS:
			case self::OPERATOR_LESS_OR_EQUAL:
			case self::OPERATOR_NOT_EQUAL:
				$sql[] = $this->quoteMixed($this->value, true);
				break;

			case self::OPERATOR_IN:
			case self::OPERATOR_NOT_IN:
				$sql[] = "(" . implode(", ", $this->quoteArray($this->value, true)) . ")";
				break;

			case self::OPERATOR_IS_EMPTY:
			case self::OPERATOR_IS_NOT_EMPTY:
			case self::OPERATOR_IS_NOT_NULL:
			case self::OPERATOR_IS_NULL:
				// NOTHING TO DO.
				break;
		}

		// Return the SQL.
		return implode(" ", $sql);
	}

}
