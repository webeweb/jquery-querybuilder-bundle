<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\Model;

use WBW\Bundle\JQuery\QueryBuilderBundle\Model\AbstractQueryBuilder;

/**
 * Test QueryBuilder.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\Model
 */
class TestQueryBuilder extends AbstractQueryBuilder {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }
}
