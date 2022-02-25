<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Api;

use JsonSerializable;

/**
 * QueryBuilder filter interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Api
 */
interface QueryBuilderFilterInterface extends JsonSerializable {

    /**
     * Get the decorator.
     *
     * @return QueryBuilderDecoratorInterface|null Returns the decorator.
     */
    public function getDecorator(): ?QueryBuilderDecoratorInterface;

    /**
     * Get the field.
     *
     * @return string|null Returns the field.
     */
    public function getField(): ?string;

    /**
     * Get the id.
     *
     * @return string|null Returns the id.
     */
    public function getId(): ?string;

    /**
     * Get the input.
     *
     * @return string|null Returns the input.
     */
    public function getInput(): ?string;

    /**
     * Get the label.
     *
     * @return string Returns the label.
     */
    public function getLabel(): string;

    /**
     * Get the multiple.
     *
     * @return bool Returns the multiple.
     */
    public function getMultiple(): bool;

    /**
     * Get the operators.
     *
     * @return array Returns the operators.
     */
    public function getOperators(): array;

    /**
     * Get the type.
     *
     * @return string|null Returns the type.
     */
    public function getType(): ?string;

    /**
     * Get the validation.
     *
     * @return QueryBuilderValidationInterface|null Returns the validation.
     */
    public function getValidation(): ?QueryBuilderValidationInterface;

    /**
     * Get the values.
     *
     * @return array|null Returns the values.
     */
    public function getValues(): ?array;
}
