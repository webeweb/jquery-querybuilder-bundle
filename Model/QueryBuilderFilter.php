<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Model;

use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderFilterInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderValidationInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Serializer\JsonSerializer;

/**
 * QueryBuilder filter.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Model
 */
class QueryBuilderFilter extends AbstractQueryBuilder implements QueryBuilderFilterInterface, QueryBuilderOperatorInterface {

    /**
     * Decorator.
     *
     * @var QueryBuilderDecoratorInterface|null
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
     * @var QueryBuilderValidationInterface|null
     */
    private $validation;

    /**
     * Values.
     *
     * @var array|null
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
    public function __construct(string $id, string $type, array $operators) {
        parent::__construct();

        $this->setId($id);
        $this->setLabel("");
        $this->setMultiple(false);
        $this->setOperators($operators);
        $this->setType($type);
    }

    /**
     * {@inheritdoc}
     */
    public function getDecorator(): ?QueryBuilderDecoratorInterface {
        return $this->decorator;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel(): string {
        return $this->label;
    }

    /**
     * {@inheritdoc}
     */
    public function getMultiple(): bool {
        return $this->multiple;
    }

    /**
     * {@inheritdoc}
     */
    public function getOperators(): array {
        return $this->operators;
    }

    /**
     * {@inheritdoc}
     */
    public function getValidation(): ?QueryBuilderValidationInterface {
        return $this->validation;
    }

    /**
     * {@inheritdoc}
     */
    public function getValues(): ?array {
        return $this->values;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeQueryBuilderFilter($this);
    }

    /**
     * Set the decorator.
     *
     * @param QueryBuilderDecoratorInterface|null $decorator The decorator.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setDecorator(?QueryBuilderDecoratorInterface $decorator): QueryBuilderFilterInterface {
        $this->decorator = $decorator;
        return $this;
    }

    /**
     * Set the label.
     *
     * @param string $label The label.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setLabel(string $label): QueryBuilderFilterInterface {
        $this->label = $label;
        return $this;
    }

    /**
     * Set the multiple.
     *
     * @param bool $multiple The multiple.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setMultiple(bool $multiple): QueryBuilderFilterInterface {
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
    public function setOperators(array $operators): QueryBuilderFilterInterface {

        $enum = QueryBuilderEnumerator::enumOperators();

        foreach ($operators as $current) {

            if (null !== $current && false === array_key_exists($current, $enum)) {
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
    public function setValidation(?QueryBuilderValidationInterface $validation): QueryBuilderFilterInterface {
        $this->validation = $validation;
        return $this;
    }

    /**
     * Set the values.
     *
     * @param array|null $values The values.
     * @return QueryBuilderFilterInterface Returns this filter.
     */
    public function setValues(?array $values): QueryBuilderFilterInterface {
        $this->values = $values;
        return $this;
    }
}
