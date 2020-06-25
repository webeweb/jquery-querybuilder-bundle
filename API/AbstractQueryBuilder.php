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

use InvalidArgumentException;

/**
 * Abstract QueryBuilder.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 * @abstract
 */
abstract class AbstractQueryBuilder implements QueryBuilderInputInterface, QueryBuilderTypeInterface {

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
     */
    protected function __construct() {
        // NOTHING TO TO.
    }

    /**
     * {@inheritDoc}
     */
    public function getField() {
        return $this->field;
    }

    /**
     * {@inheritDoc}
     */
    public function getId() {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function getInput() {
        return $this->input;
    }

    /**
     * {@inheritDoc}
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set the field.
     *
     * @param string $field The field.
     * @return AbstractQueryBuilder Returns this QueryBuilder.
     */
    public function setField($field) {
        $this->field = $field;
        return $this;
    }

    /**
     * Set the id.
     *
     * @param string $id The id.
     * @return AbstractQueryBuilder Returns this QueryBuilder.
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Set the input.
     *
     * @param string $input The input.
     * @return AbstractQueryBuilder Returns this QueryBuilder.
     * @throws InvalidArgumentException Throws an invalid argument exception if the input is invalid.
     */
    public function setInput($input) {
        if (false === in_array($input, QueryBuilderEnumerator::enumInputs())) {
            throw new InvalidArgumentException(sprintf('The input "%s" is invalid', $input));
        }
        $this->input = $input;
        return $this;
    }

    /**
     * Set the type.
     *
     * @param string $type The type.
     * @return AbstractQueryBuilder Returns this QueryBuilder.
     * @throws InvalidArgumentException Throws an invalid argument exception if the type is invalid.
     */
    public function setType($type) {
        if (null !== $type && false === in_array($type, QueryBuilderEnumerator::enumTypes())) {
            throw new InvalidArgumentException(sprintf('The type "%s" is invalid', $type));
        }
        $this->type = $type;
        return $this;
    }
}
