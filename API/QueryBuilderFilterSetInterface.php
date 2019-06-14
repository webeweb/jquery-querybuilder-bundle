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

use JsonSerializable;

/**
 * QueryBuilder filter set interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
interface QueryBuilderFilterSetInterface extends JsonSerializable {

    /**
     * Add a filter.
     *
     * @param QueryBuilderFilterInterface $filter The filter.
     * @return QueryBuilderFilterSetInterface Returns this filter set.
     */
    public function addFilter(QueryBuilderFilterInterface $filter);

    /**
     * Get the filters.
     *
     * @return QueryBuilderFilterInterface[] Returns the filters.
     */
    public function getFilters();

    /**
     * Remove a filter.
     *
     * @param QueryBuilderFilterInterface $filter The filter.
     * @return QueryBuilderFilterSetInterface Returns this filter set.
     */
    public function removeFilter(QueryBuilderFilterInterface $filter);
}
