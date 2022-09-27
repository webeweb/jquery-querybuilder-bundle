<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests;

use WBW\Bundle\CoreBundle\Tests\AbstractTestCase as TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderValidationInterface;

/**
 * Abstract test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests
 * @abstract
 */
abstract class AbstractTestCase extends TestCase {

    /**
     * Query builder decorator.
     *
     * @var QueryBuilderDecoratorInterface
     */
    protected $qbDecorator;

    /**
     * Query builder filter set.
     *
     * @var QueryBuilderFilterSetInterface
     */
    protected $qbFilterSet;

    /**
     * Query builder validation.
     *
     * @var QueryBuilderValidationInterface
     */
    protected $qbValidation;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a QueryBuilder decorator mock.
        $this->qbDecorator = $this->getMockBuilder(QueryBuilderDecoratorInterface::class)->getMock();

        // Set a QueryBuilder filter set mock.
        $this->qbFilterSet = $this->getMockBuilder(QueryBuilderFilterSetInterface::class)->getMock();

        // Set a QueryBuilder validation mock.
        $this->qbValidation = $this->getMockBuilder(QueryBuilderValidationInterface::class)->getMock();
    }
}
