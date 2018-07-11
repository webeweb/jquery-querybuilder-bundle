<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API;

use JsonSerializable;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorInterface;

/**
 * jQuery QueryBuilder filter set.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
class QueryBuilderFilterSet implements JsonSerializable {

    /**
     * Decorators.
     *
     * @var QueryBuilderDecoratorInterface[]
     */
    private $decorators = [];

    /**
     * Filters.
     *
     * @var QueryBuilderFilter[]
     */
    private $filters = [];

    /**
     * Constructor.
     */
    public function __construcct() {
        // NOTHING TO DO.
    }

    /**
     * Add a filter.
     *
     * @param QueryBuilderFilter $filter The filter.
     * @return QueryBuilderFilterSet Returns this QueryBuilder filter set.
     */
    public function addFilter(QueryBuilderFilter $filter) {
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
     * Get the filters.
     *
     * @return QueryBuilderFilter[] Returns the filters.
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
        return $this->toArray();
    }

    /**
     * Remove a filter.
     *
     * @param QueryBuilderFilter $filter The filter.
     * @return QueryBuilderFilterSet Returns this QueryBuilder filter set.
     */
    public function removeFilter(QueryBuilderFilter $filter) {
        if (true === array_key_exists($filter->getId(), $this->filters)) {
            unset($this->filters[$filter->getId()]);
        }
        return $this;
    }

    /**
     * Convert into an array representing this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function toArray() {

        // Initialize the output.
        $output = [];

        // Handle each filter.
        foreach ($this->filters as $current) {
            $output[] = $current->toArray();
        }

        // Return the output.
        return $output;
    }

}
