<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API\Condition;

/**
 * jQuery QueryBuilder condition interface.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API\Condition
 */
interface QueryBuilderConditionInterface {

	/**
	 * Conditions.
	 */
	const CONDITIONS = [
		self::CONDITION_AND,
		self::CONDITION_OR,
	];

	/**
	 * Condition AND.
	 */
	const CONDITION_AND = "AND";

	/**
	 * Condition OR.
	 */
	const CONDITION_OR = "OR";

}
