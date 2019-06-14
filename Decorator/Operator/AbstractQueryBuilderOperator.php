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

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderEnumerator;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;

/**
 * Abstract QueryBuilder operator.
 *
 * @author webeweb <https://github.com/webeweb/>
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
    protected function __construct($operator) {
        $this->setOperator($operator);
    }

    /**
     * Get the operator.
     *
     * @return string Returns the operator.
     */
    public function getOperator() {
        return $this->operator;
    }

    /**
     * Set the operator.
     *
     * @param string $operator The operator
     * @return AbstractQueryBuilderOperator Returns this operator.
     */
    protected function setOperator($operator) {
        $this->operator = $operator;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toSQL(QueryBuilderRuleInterface $rule, $wrap = false) {
        $sql = [
            $rule->getField(),
            QueryBuilderEnumerator::enumOperators()[$this->getOperator()],
        ];
        return implode(" ", $sql);
    }
}
