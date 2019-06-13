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

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Helper\QueryBuilderRepositoryHelper;
use WBW\Bundle\JQuery\QueryBuilderBundle\Normalizer\QueryBuilderNormalizer;
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
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorBeginsWith() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field LIKE 'value%'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorBetween() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_BETWEEN);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue(["value1", "value2"]);

        $this->assertEquals("field BETWEEN 'value1' AND 'value2'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorContains() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_CONTAINS);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field LIKE '%value%'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorEndsWith() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_ENDS_WITH);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field LIKE '%value'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorEquals() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_EQUAL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field = 'value'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorGreater() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_GREATER);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field > 'value'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorGreaterOrEqual() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_GREATER_OR_EQUAL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field >= 'value'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorIn() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_IN);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue(["value1", "value2"]);

        $this->assertEquals("field IN ('value1', 'value2')", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorIsEmpty() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_IS_EMPTY);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field IS NULL", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorIsNotEmpty() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_IS_NOT_EMPTY);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field IS NOT NULL", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorIsNotNull() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_IS_NOT_NULL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field IS NOT NULL", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorIsNull() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_IS_NULL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field IS NULL", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorLess() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_LESS);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field < 'value'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorLessOrEqual() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_LESS_OR_EQUAL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field <= 'value'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorNotBeginsWith() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_NOT_BEGINS_WITH);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field NOT LIKE 'value%'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorNotBetween() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_NOT_BETWEEN);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue(["value1", "value2"]);

        $this->assertEquals("field NOT BETWEEN 'value1' AND 'value2'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorNotContains() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_NOT_CONTAINS);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field NOT LIKE '%value%'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorNotEndsWith() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_NOT_ENDS_WITH);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field NOT LIKE '%value'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorNotEqual() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_NOT_EQUAL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue("value");

        $this->assertEquals("field <> 'value'", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithOperatorNotIn() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_NOT_IN);
        $obj->setType(QueryBuilderTypeInterface::TYPE_STRING);
        $obj->setValue(["value1", "value2"]);

        $this->assertEquals("field NOT IN ('value1', 'value2')", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithTypeBoolean() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_EQUAL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_BOOLEAN);
        $obj->setValue(true);

        $this->assertEquals("field = 1", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRule2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRule2SQLWithTypeDouble() {

        $obj = new QueryBuilderRule();
        $obj->setField("field");
        $obj->setOperator(QueryBuilderOperatorInterface::OPERATOR_EQUAL);
        $obj->setType(QueryBuilderTypeInterface::TYPE_DOUBLE);
        $obj->setValue(5.5);

        $this->assertEquals("field = 5.5", QueryBuilderRepositoryHelper::queryBuilderRule2SQL($obj));
    }

    /**
     * Tests the queryBuilderRuleSet2SQL() method.
     *
     * @returns void
     */
    public function testQueryBuilderRuleSet2SQL() {

        $arg = TestFixtures::getRules();

        $obj = QueryBuilderNormalizer::denormalizeQueryBuilderRuleSet($arg);

        $res = "(age > 21 OR (firstname = 'John' AND lastname = 'DOE'))";
        $this->assertEquals($res, QueryBuilderRepositoryHelper::queryBuilderRuleSet2SQL($obj));
    }
}
