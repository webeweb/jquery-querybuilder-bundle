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

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Helper\QueryBuilderRepositoryHelper;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\Serializer\JsonDeserializer;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\TestFixtures;

/**
 * QueryBuilder repository helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Helper
 */
class QueryBuilderRepositoryHelperTest extends AbstractTestCase {

    /**
     * Test queryBuilderRule2Sql()
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
     * Test queryBuilderRule2Sql()
     *
     * @returns void
     */
    public function testQueryBuilderRule2SqlWithDecorator(): void {

        $obj = new QueryBuilderRule();
        $obj->setDecorator($this->qbDecorator);

        $this->assertEquals("", QueryBuilderRepositoryHelper::queryBuilderRule2Sql($obj));
    }

    /**
     * Test queryBuilderRuleSet2Sql()
     *
     * @returns void
     */
    public function testQueryBuilderRuleSet2Sql(): void {

        $arg = TestFixtures::getRules();

        $obj = JsonDeserializer::deserializeQueryBuilderRuleSet($this->qbFilterSet, $arg);

        $res = "(age > 21 OR (firstname = 'John' AND lastname = 'DOE'))";
        $this->assertEquals($res, QueryBuilderRepositoryHelper::queryBuilderRuleSet2Sql($obj));
    }

    /**
     * Test queryBuilderRuleSet2Sql()
     *
     * @returns void
     */
    public function testQueryBuilderRuleSet2SqlWithoutRules(): void {

        $obj = JsonDeserializer::deserializeQueryBuilderRuleSet($this->qbFilterSet, []);

        $this->assertEquals("", QueryBuilderRepositoryHelper::queryBuilderRuleSet2Sql($obj));
    }
}
