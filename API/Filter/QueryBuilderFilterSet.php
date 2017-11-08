<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API\Filter;

use JsonSerializable;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorInterface;

/**
 * jQuery QueryBuilder filter set.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API\Filter
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
	 * @return QueryBuilderFilterSet Returns the QueryBuilder filter set.
	 */
	public final function addFilter(QueryBuilderFilter $filter) {
		if ($filter instanceof QueryBuilderDecoratorInterface) {
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
	public final function getDecorator($id) {
		if (!array_key_exists($id, $this->decorators)) {
			return null;
		}
		return $this->decorators[$id];
	}

	/**
	 * Get the filters.
	 *
	 * @return QueryBuilderFilter[] Returns the filters.
	 */
	public final function getFilters() {
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
	 * @return QueryBuilderFilterSet Returns the QueryBuilder filter set.
	 */
	public final function removeFilter(QueryBuilderFilter $filter) {
		if (array_key_exists($filter->getId(), $this->filters)) {
			unset($this->filters[$filter->getId()]);
		}
		return $this;
	}

	/**
	 * Convert into an array representing this instance.
	 *
	 * @return array Returns an array representing this instance.
	 */
	public final function toArray() {

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
