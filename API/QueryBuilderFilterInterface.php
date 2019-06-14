<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API;

use JsonSerializable;

/**
 * QueryBuilder filter interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
interface QueryBuilderFilterInterface extends JsonSerializable {

    /**
     * Get the decorator.
     *
     * @return QueryBuilderDecoratorInterface Returns the decorator.
     */
    public function getDecorator();

    /**
     * Get the field.
     *
     * @return string Returns the field.
     */
    public function getField();

    /**
     * Get the id.
     *
     * @return string Returns the id.
     */
    public function getId();

    /**
     * Get the input.
     *
     * @return string Returns the input.
     */
    public function getInput();

    /**
     * Get the label.
     *
     * @return string Returns the label.
     */
    public function getLabel();

    /**
     * Get the multiple.
     *
     * @return bool Returns the multiple.
     */
    public function getMultiple();

    /**
     * Get the operators.
     *
     * @return array Returns the operators.
     */
    public function getOperators();

    /**
     * Get the type.
     *
     * @return string Returns the type.
     */
    public function getType();

    /**
     * Get the validation.
     *
     * @return QueryBuilderValidationInterface Returns the validation.
     */
    public function getValidation();

    /**
     * Get the values.
     *
     * @return array Returns the values.
     */
    public function getValues();
}
