<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderEnumerator;

/**
 * Abstract QueryBuilder operator.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Operator
 * @abstract
 */
abstract class AbstractQueryBuilderOperator implements QueryBuilderDecoratorInterface, QueryBuilderOperatorInterface {

    /**
     * Operator.
     *
     * @var string
     */
    private $operator;

    /**
     * Constructor.
     *
     * @param string $operator The operator.
     */
    protected function __construct(string $operator) {
        $this->setOperator($operator);
    }

    /**
     * Get the operator.
     *
     * @return string Returns the operator.
     */
    public function getOperator(): string {
        return $this->operator;
    }

    /**
     * Set the operator.
     *
     * @param string $operator The operator
     * @return AbstractQueryBuilderOperator Returns this operator.
     */
    protected function setOperator(string $operator): AbstractQueryBuilderOperator {
        $this->operator = $operator;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toSql(QueryBuilderRuleInterface $rule, bool $wrap = false): string {

        $sql = [
            $rule->getField(),
            QueryBuilderEnumerator::enumOperators()[$this->getOperator()],
        ];

        return implode(" ", $sql);
    }
}
