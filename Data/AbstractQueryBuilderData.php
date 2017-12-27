<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Data;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\Input\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Type\QueryBuilderTypeInterface;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * Abstract jQuery QueryBuilder data.
 *
 * @author Camille A. <c.attia@nectardecode.com>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Data
 * @abstract
 */
abstract class AbstractQueryBuilderData implements QueryBuilderInputInterface, QueryBuilderTypeInterface {

	/**
	 * Field.
	 *
	 * @var string
	 */
	private $field;

	/**
	 * Id.
	 *
	 * @var string
	 */
	private $id;

	/**
	 * Input.
	 *
	 * @var string
	 */
	private $input;

	/**
	 * Type.
	 *
	 * @var string
	 */
	private $type;

	/**
	 * Constructor.
	 *
	 * @param string $id The id.
	 * @param string $type The type.
	 * @throws IllegalArgumentException Throws an illegal argument exception if the type is invalid.
	 */
	public function __construct($id = null, $type = null) {
		$this->setId($id);
		$this->setType($type);
	}

	/**
	 * Get the field.
	 *
	 * @return string Returns the field.
	 */
	final public function getField() {
		return $this->field;
	}

	/**
	 * Get the id.
	 *
	 * @return string Returns the id.
	 */
	final public function getId() {
		return $this->id;
	}

	/**
	 * Get the input.
	 *
	 * @return string Returns the input.
	 */
	final public function getInput() {
		return $this->input;
	}

	/**
	 * Get the type.
	 *
	 * @return string Returns the type.
	 */
	final public function getType() {
		return $this->type;
	}

	/**
	 * Set the field.
	 *
	 * @param string $field The field.
	 * @return AbstractQueryBuilder Returns the QueryBuilder data.
	 */
	final public function setField($field) {
		$this->field = $field;
		return $this;
	}

	/**
	 * Set the id.
	 *
	 * @param string $id The id.
	 * @return AbstractQueryBuilder Returns the QueryBuilder data.
	 */
	final public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * Set the input.
	 *
	 * @param string $input The input.
	 * @return AbstractQueryBuilder Returns the QueryBuilder data.
	 * @throws IllegalArgumentException Throws an illegal argument exception if the input is invalid.
	 */
	final public function setInput($input) {
		if (false === in_array($input, self::INPUTS)) {
			throw new IllegalArgumentException("The input \"" . $input . "\" is invalid");
		}
		$this->input = $input;
		return $this;
	}

	/**
	 * Set the type.
	 *
	 * @param string $type The type.
	 * @return AbstractQueryBuilder Returns the QueryBuilder data.
	 * @throws IllegalArgumentException Throws an illegal argument exception if the type is invalid.
	 */
	final public function setType($type) {
		if (null !== $type && false === in_array($type, self::TYPES)) {
			throw new IllegalArgumentException("The type \"" . $type . "\" is invalid");
		}
		$this->type = $type;
		return $this;
	}

}
