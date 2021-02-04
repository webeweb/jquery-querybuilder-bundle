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
     * Filters.
     *
     * @var QueryBuilderFilterInterface[]
     */
    private $filters;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setFilters([]);
    }

    /**
     * {@inheritDoc}
     */
    public function addFilter(QueryBuilderFilterInterface $filter): QueryBuilderFilterSetInterface {
        $this->filters[$filter->getId()] = $filter;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDecorator(string $id): ?QueryBuilderDecoratorInterface {

        $filter = $this->getFilter($id);
        if (null === $filter) {
            return null;
        }

        return $filter->getDecorator();
    }

    /**
     * {@inheritDoc}
     */
    public function getFilter(string $id): ?QueryBuilderFilterInterface {

        if (false === array_key_exists($id, $this->filters)) {
            return null;
        }

        return $this->filters[$id];
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters(): array {
        return $this->filters;
    }

    /**
     * Serialize this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function jsonSerialize(): array {
        return QueryBuilderNormalizer::normalizeQueryBuilderFilterSet($this);
    }

    /**
     * {@inheritDoc}
     */
    public function removeFilter(QueryBuilderFilterInterface $filter): QueryBuilderFilterSetInterface {
        if (true === array_key_exists($filter->getId(), $this->filters)) {
            unset($this->filters[$filter->getId()]);
        }
        return $this;
    }

    /**
     * Set the filters.
     *
     * @param QueryBuilderFilterInterface[] $filters The filters.
     * @return QueryBuilderFilterSetInterface Returns this filter set.
     */
    protected function setFilters(array $filters): QueryBuilderFilterSetInterface {
        $this->filters = $filters;
        return $this;
    }
}
