<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Decorator;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Library\Core\Argument\ArrayHelper;

/**
 * QueryBuilder decorator factory.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator
 */
class QueryBuilderDecoratorFactory implements QueryBuilderOperatorInterface, QueryBuilderTypeInterface {

    /**
     * Enumerate the QueryBuilder operators.
     *
     * @return array Returns the QueryBuilder operators enumeration.
     */
    protected static function enumQueryBuilderOperators() {
        return [
            self::OPERATOR_BEGINS_WITH      => __NAMESPACE__ . "\\Operator\\BeginsWithQueryBuilderOperator",
            self::OPERATOR_BETWEEN          => __NAMESPACE__ . "\\Operator\\BetweenQueryBuilderOperator",
            self::OPERATOR_CONTAINS         => __NAMESPACE__ . "\\Operator\\ContainsQueryBuilderOperator",
            self::OPERATOR_ENDS_WITH        => __NAMESPACE__ . "\\Operator\\EndsWithQueryBuilderOperator",
            self::OPERATOR_EQUAL            => __NAMESPACE__ . "\\Operator\\EqualQueryBuilderOperator",
            self::OPERATOR_GREATER          => __NAMESPACE__ . "\\Operator\\GreaterQueryBuilderOperator",
            self::OPERATOR_GREATER_OR_EQUAL => __NAMESPACE__ . "\\Operator\\GreaterOrEqualQueryBuilderOperator",
            self::OPERATOR_IN               => __NAMESPACE__ . "\\Operator\\InQueryBuilderOperator",
            self::OPERATOR_IS_EMPTY         => __NAMESPACE__ . "\\Operator\\IsEmptyQueryBuilderOperator",
            self::OPERATOR_IS_NOT_EMPTY     => __NAMESPACE__ . "\\Operator\\IsNotEmptyQueryBuilderOperator",
            self::OPERATOR_IS_NOT_NULL      => __NAMESPACE__ . "\\Operator\\IsNotNullQueryBuilderOperator",
            self::OPERATOR_IS_NULL          => __NAMESPACE__ . "\\Operator\\IsNullQueryBuilderOperator",
            self::OPERATOR_LESS             => __NAMESPACE__ . "\\Operator\\LessQueryBuilderOperator",
            self::OPERATOR_LESS_OR_EQUAL    => __NAMESPACE__ . "\\Operator\\LessOrEqualQueryBuilderOperator",
            self::OPERATOR_NOT_BEGINS_WITH  => __NAMESPACE__ . "\\Operator\\NotBeginsWithQueryBuilderOperator",
            self::OPERATOR_NOT_BETWEEN      => __NAMESPACE__ . "\\Operator\\NotBetweenQueryBuilderOperator",
            self::OPERATOR_NOT_CONTAINS     => __NAMESPACE__ . "\\Operator\\NotContainsQueryBuilderOperator",
            self::OPERATOR_NOT_ENDS_WITH    => __NAMESPACE__ . "\\Operator\\NotEndsWithQueryBuilderOperator",
            self::OPERATOR_NOT_EQUAL        => __NAMESPACE__ . "\\Operator\\NotEqualQueryBuilderOperator",
            self::OPERATOR_NOT_IN           => __NAMESPACE__ . "\\Operator\\NotInQueryBuilderOperator",
        ];
    }

    /**
     * Enumerate the QueryBuilder types.
     *
     * @return array Returns the QueryBuilder types enumeration.
     */
    protected static function enumQueryBuilderTypes() {
        return [
            self::TYPE_BOOLEAN  => __NAMESPACE__ . "\\Type\\BooleanQueryBuilderType",
            self::TYPE_DATE     => __NAMESPACE__ . "\\Type\\DateQueryBuilderType",
            self::TYPE_DATETIME => __NAMESPACE__ . "\\Type\\DateTimeQueryBuilderType",
            self::TYPE_DOUBLE   => __NAMESPACE__ . "\\Type\\DoubleQueryBuilderType",
            self::TYPE_INTEGER  => __NAMESPACE__ . "\\Type\\IntegerQueryBuilderType",
            self::TYPE_STRING   => __NAMESPACE__ . "\\Type\\StringQueryBuilderType",
            self::TYPE_TIME     => __NAMESPACE__ . "\\Type\\TimeQueryBuilderType",
        ];
    }

    /**
     * Create a QueryBuilder decorator.
     *
     * @param array $enum The enumeration.
     * @param string $key The key.
     * @return QueryBuilderDecoratorInterface|null Returns the QueryBuilder decorator in case of success, null otherwise.
     */
    protected static function newQueryBuilderDecorator($enum, $key) {

        $class = ArrayHelper::get($enum, $key);
        if (null === $class) {
            return null;
        }

        return new $class();
    }

    /**
     * Create a QueryBuilder operator.
     *
     * @param string $operator The Operator.
     * @return QueryBuilderDecoratorInterface|null Returns the QueryBuilder operator in case of success, false otherwise.
     */
    public static function newQueryBuilderOperator($operator) {
        return static::newQueryBuilderDecorator(static::enumQueryBuilderOperators(), $operator);
    }

    /**
     * Create a QueryBuilder type.
     *
     * @param string $type The type.
     * @return QueryBuilderDecoratorInterface|null Returns the QueryBuilder type in case of success, false otherwise.
     */
    public static function newQueryBuilderType($type) {
        return static::newQueryBuilderDecorator(static::enumQueryBuilderTypes(), $type);
    }
}
