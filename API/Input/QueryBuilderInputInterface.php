<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API\Input;

/**
 * jQuery QueryBuilder input interface.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API\Input
 */
interface QueryBuilderInputInterface {

	/**
	 * Inputs.
	 */
	const INPUTS = [
		self::INPUT_CHECKBOX,
		self::INPUT_NUMBER,
		self::INPUT_RADIO,
		self::INPUT_SELECT,
		self::INPUT_TEXT,
		self::INPUT_TEXTAREA,
	];

	/**
	 * Input checkbox.
	 */
	const INPUT_CHECKBOX = "checkbox";

	/**
	 * Input number.
	 */
	const INPUT_NUMBER = "number";

	/**
	 * Input radio.
	 */
	const INPUT_RADIO = "radio";

	/**
	 * Input select.
	 */
	const INPUT_SELECT = "select";

	/**
	 * Input text.
	 */
	const INPUT_TEXT = "text";

	/**
	 * Input textarea.
	 */
	const INPUT_TEXTAREA = "textarea";

}
