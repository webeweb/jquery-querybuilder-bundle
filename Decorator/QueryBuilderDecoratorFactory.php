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

use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Library\Core\Argument\Helper\ArrayHelper;

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
    protected static function enumQueryBuilderOperators(): array {
        return [
            static::OPERATOR_BEGINS_WITH      => __NAMESPACE__ . "\\Operator\\BeginsWithQueryBuilderOperator",
            static::OPERATOR_BETWEEN          => __NAMESPACE__ . "\\Operator\\BetweenQueryBuilderOperator",
            static::OPERATOR_CONTAINS         => __NAMESPACE__ . "\\Operator\\ContainsQueryBuilderOperator",
            static::OPERATOR_ENDS_WITH        => __NAMESPACE__ . "\\Operator\\EndsWithQueryBuilderOperator",
            static::OPERATOR_EQUAL            => __NAMESPACE__ . "\\Operator\\EqualQueryBuilderOperator",
            static::OPERATOR_GREATER          => __NAMESPACE__ . "\\Operator\\GreaterQueryBuilderOperator",
            static::OPERATOR_GREATER_OR_EQUAL => __NAMESPACE__ . "\\Operator\\GreaterOrEqualQueryBuilderOperator",
            static::OPERATOR_IN               => __NAMESPACE__ . "\\Operator\\InQueryBuilderOperator",
            static::OPERATOR_IS_EMPTY         => __NAMESPACE__ . "\\Operator\\IsEmptyQueryBuilderOperator",
            static::OPERATOR_IS_NOT_EMPTY     => __NAMESPACE__ . "\\Operator\\IsNotEmptyQueryBuilderOperator",
            static::OPERATOR_IS_NOT_NULL      => __NAMESPACE__ . "\\Operator\\IsNotNullQueryBuilderOperator",
            static::OPERATOR_IS_NULL          => __NAMESPACE__ . "\\Operator\\IsNullQueryBuilderOperator",
            static::OPERATOR_LESS             => __NAMESPACE__ . "\\Operator\\LessQueryBuilderOperator",
            static::OPERATOR_LESS_OR_EQUAL    => __NAMESPACE__ . "\\Operator\\LessOrEqualQueryBuilderOperator",
            static::OPERATOR_NOT_BEGINS_WITH  => __NAMESPACE__ . "\\Operator\\NotBeginsWithQueryBuilderOperator",
            static::OPERATOR_NOT_BETWEEN      => __NAMESPACE__ . "\\Operator\\NotBetweenQueryBuilderOperator",
            static::OPERATOR_NOT_CONTAINS     => __NAMESPACE__ . "\\Operator\\NotContainsQueryBuilderOperator",
            static::OPERATOR_NOT_ENDS_WITH    => __NAMESPACE__ . "\\Operator\\NotEndsWithQueryBuilderOperator",
            static::OPERATOR_NOT_EQUAL        => __NAMESPACE__ . "\\Operator\\NotEqualQueryBuilderOperator",
            static::OPERATOR_NOT_IN           => __NAMESPACE__ . "\\Operator\\NotInQueryBuilderOperator",
        ];
    }

    /**
     * Enumerate the QueryBuilder types.
     *
     * @return array Returns the QueryBuilder types enumeration.
     */
    protected static function enumQueryBuilderTypes(): array {
        return [
            static::TYPE_BOOLEAN  => __NAMESPACE__ . "\\Type\\BooleanQueryBuilderType",
            static::TYPE_DATE     => __NAMESPACE__ . "\\Type\\DateQueryBuilderType",
            static::TYPE_DATETIME => __NAMESPACE__ . "\\Type\\DateTimeQueryBuilderType",
            static::TYPE_DOUBLE   => __NAMESPACE__ . "\\Type\\DoubleQueryBuilderType",
            static::TYPE_INTEGER  => __NAMESPACE__ . "\\Type\\IntegerQueryBuilderType",
            static::TYPE_STRING   => __NAMESPACE__ . "\\Type\\StringQueryBuilderType",
            static::TYPE_TIME     => __NAMESPACE__ . "\\Type\\TimeQueryBuilderType",
        ];
    }

    /**
     * Create a QueryBuilder decorator.
     *
     * @param array $enum The enumeration.
     * @param string $key The key.
     * @return QueryBuilderDecoratorInterface|null Returns the QueryBuilder decorator in case of success, null otherwise.
     * @throws InvalidArgumentException Throws an invalid argument exception if the argument is invalid.
     */
    protected static function newQueryBuilderDecorator(array $enum, string $key): ?QueryBuilderDecoratorInterface {

        $class = ArrayHelper::get($enum, $key);
        if (null === $class) {
            throw new InvalidArgumentException(sprintf('The decorator "%s" is invalid', $key));
        }

        return new $class();
    }

    /**
     * Create a QueryBuilder operator.
     *
     * @param string $operator The Operator.
     * @return QueryBuilderDecoratorInterface|null Returns the QueryBuilder operator in case of success, false otherwise.
     * @throws InvalidArgumentException Throws an invalid argument exception if the argument is invalid.
     */
    public static function newQueryBuilderOperator(string $operator): ?QueryBuilderDecoratorInterface {
        return static::newQueryBuilderDecorator(static::enumQueryBuilderOperators(), $operator);
    }

    /**
     * Create a QueryBuilder type.
     *
     * @param string $type The type.
     * @return QueryBuilderDecoratorInterface|null Returns the QueryBuilder type in case of success, false otherwise.
     * @throws InvalidArgumentException Throws an invalid argument exception if the argument is invalid.
     */
    public static function newQueryBuilderType(string $type): ?QueryBuilderDecoratorInterface {
        return static::newQueryBuilderDecorator(static::enumQueryBuilderTypes(), $type);
    }
}
