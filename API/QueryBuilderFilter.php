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
use WBW\Bundle\JQuery\QueryBuilderBundle\Normalizer\QueryBuilderNormalizer;

/**
 * QueryBuilder filter.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
class QueryBuilderFilter extends AbstractQueryBuilder implements QueryBuilderFilterInterface, QueryBuilderOperatorInterface {

    /**
     * Decorator.
     *
     * @var QueryBuilderDecoratorInterface
     */
    private $decorator;

    /**
     * Label.
     *
     * @var string
     */
    private $label;

    /**
     * Multiple.
     *
     * @var bool
     */
    private $multiple;

    /**
     * Operators.
     *
     * @var array
     */
    private $operators;

    /**
     * Validation.
     *
     * @var QueryBuilderValidationInterface
     */
    private $validation;

    /**
     * Values.
     *
     * @var array
     */
    private $values;

    /**
     * Constructor.
     *
     * @param string $id The id.
     * @param string $type The type.
     * @param array $operators The operators.
     * @throws InvalidArgumentException Throws an invalid argument exception if an argument is invalid.
     */
    public function __construct($id, $type, array $operators) {
        parent::__construct();
        $this->setId($id);
        $this->setLabel("");
        $this->setMultiple(false);
        $this->setOperators($operators);
        $this->setType($type);
    }

    /**
     * Get the decorator.
     *
     * @return QueryBuilderDecoratorInterface Returns the decorator.
     */
    public function getDecorator() {
        return $this->decorator;
    }

    /**
     * {@inheritDoc}
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * {@inheritDoc}
     */
    public function getMultiple() {
        return $this->multiple;
    }

    /**
     * {@inheritDoc}
     */
    public function getOperators() {
        return $this->operators;
    }

    /**
     * {@inheritDoc}
     */
    public function getValidation() {
        return $this->validation;
    }

    /**
     * {@inheritDoc}
     */
    public function getValues() {
        return $this->values;
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize() {
        return QueryBuilderNormalizer::normalizeQueryBuilderFilter($this);
    }

    /**
     * Set the decorator.
     *
     * @param QueryBuilderDecoratorInterface|null $decorator The decorator.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setDecorator(QueryBuilderDecoratorInterface $decorator = null) {
        $this->decorator = $decorator;
        return $this;
    }

    /**
     * Set the label.
     *
     * @param string $label The label.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setLabel($label) {
        $this->label = $label;
        return $this;
    }

    /**
     * Set the multiple.
     *
     * @param bool $multiple The multiple.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setMultiple($multiple) {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * Set the operators.
     *
     * @param array $operators The operators.
     * @return QueryBuilderFilterInterface Returns this filter.
     * @throws InvalidArgumentException Throws an invalid argument exception if an operator is invalid.
     */
    public function setOperators(array $operators) {
        $enumOperators = QueryBuilderEnumerator::enumOperators();
        foreach ($operators as $current) {
            if (null !== $current && false === array_key_exists($current, $enumOperators)) {
                throw new InvalidArgumentException(sprintf('The operator "%s" is invalid', $current));
            }
        }
        $this->operators = $operators;
        return $this;
    }

    /**
     * Set the validation.
     *
     * @param QueryBuilderValidationInterface|null $validation The validation.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setValidation(QueryBuilderValidationInterface $validation = null) {
        $this->validation = $validation;
        return $this;
    }

    /**
     * Set the values.
     *
     * @param array $values The values.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setValues(array $values) {
        $this->values = $values;
        return $this;
    }
}
