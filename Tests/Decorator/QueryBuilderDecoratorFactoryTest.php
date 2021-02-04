<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator;

use Exception;
use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderEnumerator;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorFactory;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures\Decorator\TestQueryBuilderDecoratorFactory;

/**
 * QueryBuilder decorator factory test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Decorator
 */
class QueryBuilderDecoratorFactoryTest extends AbstractTestCase {

    /**
     * Tests the enumQueryBuilderOperators() method.
     *
     * @return void
     */
    public function testEnumQueryBuilderOperators(): void {

        $res = [
            QueryBuilderOperatorInterface::OPERATOR_BEGINS_WITH      => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\BeginsWithQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_BETWEEN          => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\BetweenQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_CONTAINS         => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\ContainsQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_ENDS_WITH        => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\EndsWithQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_EQUAL            => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\EqualQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_GREATER          => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\GreaterQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_GREATER_OR_EQUAL => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\GreaterOrEqualQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_IN               => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\InQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_IS_EMPTY         => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\IsEmptyQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_IS_NOT_EMPTY     => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\IsNotEmptyQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_IS_NOT_NULL      => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\IsNotNullQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_IS_NULL          => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\IsNullQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_LESS             => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\LessQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_LESS_OR_EQUAL    => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\LessOrEqualQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_NOT_BEGINS_WITH  => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\NotBeginsWithQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_NOT_BETWEEN      => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\NotBetweenQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_NOT_CONTAINS     => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\NotContainsQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_NOT_ENDS_WITH    => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\NotEndsWithQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_NOT_EQUAL        => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\NotEqualQueryBuilderOperator",
            QueryBuilderOperatorInterface::OPERATOR_NOT_IN           => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Operator\\NotInQueryBuilderOperator",
        ];

        $this->assertEquals($res, TestQueryBuilderDecoratorFactory::enumQueryBuilderOperators());
    }

    /**
     * Tests the enumQueryBuilderTypes() method.
     *
     * @return void
     */
    public function testEnumQueryBuilderTypes(): void {

        $res = [
            QueryBuilderTypeInterface::TYPE_BOOLEAN  => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Type\\BooleanQueryBuilderType",
            QueryBuilderTypeInterface::TYPE_DATE     => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Type\\DateQueryBuilderType",
            QueryBuilderTypeInterface::TYPE_DATETIME => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Type\\DateTimeQueryBuilderType",
            QueryBuilderTypeInterface::TYPE_DOUBLE   => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Type\\DoubleQueryBuilderType",
            QueryBuilderTypeInterface::TYPE_INTEGER  => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Type\\IntegerQueryBuilderType",
            QueryBuilderTypeInterface::TYPE_STRING   => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Type\\StringQueryBuilderType",
            QueryBuilderTypeInterface::TYPE_TIME     => "WBW\\Bundle\\JQuery\\QueryBuilderBundle\\Decorator\\Type\\TimeQueryBuilderType",
        ];

        $this->assertEquals($res, TestQueryBuilderDecoratorFactory::enumQueryBuilderTypes());
    }

    /**
     * Tests the newQueryBuilderOperator() method.
     *
     * @return void
     */
    public function testNewQueryBuilderDecoratorOperator(): void {

        $classes = TestQueryBuilderDecoratorFactory::enumQueryBuilderOperators();
        $enum    = QueryBuilderEnumerator::enumOperators();

        foreach (array_keys($enum) as $current) {

            $res = QueryBuilderDecoratorFactory::newQueryBuilderOperator($current);
            $this->assertInstanceOf(QueryBuilderDecoratorInterface::class, $res);
            $this->assertInstanceOf($classes[$current], $res);
        }
    }

    /**
     * Tests the newQueryBuilderOperator() method.
     *
     * @return void
     */
    public function testNewQueryBuilderDecoratorOperatorWithInvalidArgumentException(): void {

        try {

            QueryBuilderDecoratorFactory::newQueryBuilderOperator("operator");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The decorator "operator" is invalid', $ex->getMessage());
        }
    }

    /**
     * Tests the newQueryBuilderType() method.
     *
     * @return void
     */
    public function testNewQueryBuilderDecoratorType(): void {

        $classes = TestQueryBuilderDecoratorFactory::enumQueryBuilderTypes();
        $enum    = QueryBuilderEnumerator::enumTypes();

        foreach ($enum as $current) {

            $res = QueryBuilderDecoratorFactory::newQueryBuilderType($current);
            $this->assertInstanceOf(QueryBuilderDecoratorInterface::class, $res);
            $this->assertInstanceOf($classes[$current], $res);
        }
    }

    /**
     * Tests the newQueryBuilderType() method.
     *
     * @return void
     */
    public function testNewQueryBuilderDecoratorTypeWithInvalidArgumentException(): void {

        try {

            QueryBuilderDecoratorFactory::newQueryBuilderType("type");
        } catch (Exception $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals('The decorator "type" is invalid', $ex->getMessage());
        }
    }
}
