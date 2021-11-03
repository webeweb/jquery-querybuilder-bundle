<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Api;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder condition interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 */
class QueryBuilderConditionInterfaceTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("AND", QueryBuilderConditionInterface::CONDITION_AND);
        $this->assertEquals("OR", QueryBuilderConditionInterface::CONDITION_OR);
    }
}
