<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API\Operator;

/**
 * jQuery QueryBuilder operator interface.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API\Operator
 */
interface QueryBuilderOperatorInterface {

	/**
	 * Operators.
	 */
	const OPERATORS = [
		self::OPERATOR_BEGINS_WITH		 => "LIKE",
		self::OPERATOR_BETWEEN			 => "BETWEEN",
		self::OPERATOR_CONTAINS			 => "LIKE",
		self::OPERATOR_ENDS_WITH		 => "LIKE",
		self::OPERATOR_EQUAL			 => "=",
		self::OPERATOR_GREATER			 => ">",
		self::OPERATOR_GREATER_OR_EQUAL	 => ">=",
		self::OPERATOR_IN				 => "IN",
		self::OPERATOR_IS_EMPTY			 => "IS NULL",
		self::OPERATOR_IS_NOT_EMPTY		 => "IS NOT NULL",
		self::OPERATOR_IS_NOT_NULL		 => "IS NOT NULL",
		self::OPERATOR_IS_NULL			 => "IS NULL",
		self::OPERATOR_LESS				 => "<",
		self::OPERATOR_LESS_OR_EQUAL	 => "<=",
		self::OPERATOR_NOT_BEGINS_WITH	 => "NOT LIKE",
		self::OPERATOR_NOT_BETWEEN		 => "NOT BETWEEN",
		self::OPERATOR_NOT_CONTAINS		 => "NOT LIKE",
		self::OPERATOR_NOT_ENDS_WITH	 => "NOT LIKE",
		self::OPERATOR_NOT_EQUAL		 => "<>",
		self::OPERATOR_NOT_IN			 => "NOT IN",
	];

	/**
	 * Operator begins with.
	 */
	const OPERATOR_BEGINS_WITH = "begins_with";

	/**
	 * Operator between.
	 */
	const OPERATOR_BETWEEN = "between";

	/**
	 * Operator contains.
	 */
	const OPERATOR_CONTAINS = "contains";

	/**
	 * Operator ends with.
	 */
	const OPERATOR_ENDS_WITH = "ends_with";

	/**
	 * Operator equal.
	 */
	const OPERATOR_EQUAL = "equal";

	/**
	 * Operator greater.
	 */
	const OPERATOR_GREATER = "greater";

	/**
	 * Operator greater or equal.
	 */
	const OPERATOR_GREATER_OR_EQUAL = "greater_or_equal";

	/**
	 * Operator in.
	 */
	const OPERATOR_IN = "in";

	/**
	 * Operator less.
	 */
	const OPERATOR_LESS = "less";

	/**
	 * Operator less or equal.
	 */
	const OPERATOR_LESS_OR_EQUAL = "less_or_equal";

	/**
	 * Operator not begins with.
	 */
	const OPERATOR_NOT_BEGINS_WITH = "not_begins_with";

	/**
	 * Operator not between.
	 */
	const OPERATOR_NOT_BETWEEN = "not_between";

	/**
	 * Operator not contains.
	 */
	const OPERATOR_NOT_CONTAINS = "not_contains";

	/**
	 * Operator not ends with.
	 */
	const OPERATOR_NOT_ENDS_WITH = "not_ends_with";

	/**
	 * Operator not_equal.
	 */
	const OPERATOR_NOT_EQUAL = "not_equal";

	/**
	 * Operator not in.
	 */
	const OPERATOR_NOT_IN = "not_in";

	/**
	 * Operator is empty.
	 */
	const OPERATOR_IS_EMPTY = "is_empty";

	/**
	 * Operator is not empty.
	 */
	const OPERATOR_IS_NOT_EMPTY = "is_not_empty";

	/**
	 * Operator is not null.
	 */
	const OPERATOR_IS_NOT_NULL = "is_not_null";

	/**
	 * Operator is null.
	 */
	const OPERATOR_IS_NULL = "is_null";

}
