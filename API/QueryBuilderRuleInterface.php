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

/**
 * QueryBuilder rule interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
interface QueryBuilderRuleInterface {

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
     * Get the operator.
     *
     * @return string Returns the operator.
     */
    public function getOperator();

    /**
     * Get the type.
     *
     * @return string Returns the type.
     */
    public function getType();

    /**
     * Get the value.
     *
     * @return mixed Returns the value.
     */
    public function getValue();
}
