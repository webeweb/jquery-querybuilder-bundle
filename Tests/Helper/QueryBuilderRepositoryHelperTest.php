<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Helper;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Helper\QueryBuilderRepositoryHelper;
use WBW\Bundle\JQuery\QueryBuilderBundle\Serializer\JsonDeserializer;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\TestFixtures;

/**
 * QueryBuilder repository helper test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Helper
 */
class QueryBuilderRepositoryHelperTest extends AbstractTestCase {

    /**
     * Tests the queryBuilderRule2Sql() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2Sql(): void {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_EQUAL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field = 'value'", QueryBuilderRepositoryHelper::queryBuilderRule2Sql($obj));
    }

    /**
     * Tests the queryBuilderRule2Sql() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SqlWithDecorator(): void {

        // Set a QueryBuilder decorator mock.
        $decorator = $this->getMockBuilder(QueryBuilderDecoratorInterface::class)->getMock();

        $obj = new QueryBuilderRule();
        $obj->setDecorator($decorator);

        $this->assertEquals("", QueryBuilderRepositoryHelper::queryBuilderRule2Sql($obj));
    }

    /**
     * Tests the queryBuilderRuleSet2Sql() method.
     *
     * @returns void
     */
    public function testQueryBuilderRuleSet2Sql(): void {

        // Set a QueryBuilder filter set mock.
        $filterSet = $this->getMockBuilder(QueryBuilderFilterSetInterface::class)->getMock();

        $arg = TestFixtures::getRules();

        $obj = JsonDeserializer::deserializeQueryBuilderRuleSet($filterSet, $arg);

        $res = "(age > 21 OR (firstname = 'John' AND lastname = 'DOE'))";
        $this->assertEquals($res, QueryBuilderRepositoryHelper::queryBuilderRuleSet2Sql($obj));
    }

    /**
     * Tests the queryBuilderRuleSet2Sql() method.
     *
     * @returns void
     */
    public function testQueryBuilderRuleSet2SqlWithoutRules(): void {

        // Set a QueryBuilder filter set mock.
        $filterSet = $this->getMockBuilder(QueryBuilderFilterSetInterface::class)->getMock();

        $obj = JsonDeserializer::deserializeQueryBuilderRuleSet($filterSet, []);

        $this->assertEquals("", QueryBuilderRepositoryHelper::queryBuilderRuleSet2Sql($obj));
    }
}
