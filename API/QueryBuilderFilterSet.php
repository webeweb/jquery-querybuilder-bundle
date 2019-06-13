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

use WBW\Bundle\JQuery\QueryBuilderBundle\Normalizer\QueryBuilderNormalizer;

/**
 * QueryBuilder filter set.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
class QueryBuilderFilterSet implements QueryBuilderFilterSetInterface {

    /**
     * Decorators.
     *
     * @var QueryBuilderDecoratorInterface[]
     */
    private $decorators;

    /**
     * Filters.
     *
     * @var QueryBuilderFilterInterface[]
     */
    private $filters;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setDecorators([]);
        $this->setFilters([]);
    }

    /**
     * {@inheritDoc}
     */
    public function addFilter(QueryBuilderFilterInterface $filter) {
        if (true === ($filter instanceof QueryBuilderDecoratorInterface)) {
            $this->decorators[$filter->getId()] = $filter;
        }
        $this->filters[$filter->getId()] = $filter;
        return $this;
    }

    /**
     * Get a decorator.
     *
     * @param string $id The id.
     * @return QueryBuilderDecoratorInterface Returns the decorator in case of success, null otherwise.
     */
    public function getDecorator($id) {
        if (false === array_key_exists($id, $this->decorators)) {
            return null;
        }
        return $this->decorators[$id];
    }

    /**
     * {@inheritDoc}
     */
    public function getDecorators() {
        return $this->decorators;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters() {
        return $this->filters;
    }

    /**
     * Serialize this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function jsonSerialize() {
        return QueryBuilderNormalizer::normalizeQueryBuilderFilterSet($this);
    }

    /**
     * {@inheritDoc}
     */
    public function removeFilter(QueryBuilderFilterInterface $filter) {
        if (true === array_key_exists($filter->getId(), $this->filters)) {
            unset($this->filters[$filter->getId()]);
        }
        return $this;
    }

    /**
     * Set the decorators.
     *
     * @param QueryBuilderDecoratorInterface[] $decorators The decorators.
     * @return QueryBuilderFilterSetInterface Returns this filter set.
     */
    protected function setDecorators(array $decorators) {
        $this->decorators = $decorators;
        return $this;
    }

    /**
     * Set the filters.
     *
     * @param QueryBuilderFilterInterface[] $filters The filters.
     * @return QueryBuilderFilterSetInterface Returns this filter set.
     */
    protected function setFilters(array $filters) {
        $this->filters = $filters;
        return $this;
    }
}
