<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderInputInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;

/**
 * Test fixtures.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Fixtures
 */
class TestFixtures {

    /**
     * Get a rule.
     *
     * @return array Returns a rule.
     */
    public static function getRule() {
        return [
            "id"       => "age",
            "field"    => "age",
            "input"    => QueryBuilderInputInterface::INPUT_NUMBER,
            "operator" => QueryBuilderOperatorInterface::OPERATOR_GREATER,
            "type"     => QueryBuilderTypeInterface::TYPE_INTEGER,
            "value"    => "21",
        ];
    }

    /**
     * Get the rules.
     *
     * @return array Returns the rules.
     */
    public static function getRules() {
        return [
            "condition" => QueryBuilderConditionInterface::CONDITION_OR,
            "rules"     => [

                    static::getRule(),

                [
                    "condition" => QueryBuilderConditionInterface::CONDITION_AND,
                    "rules"     => [
                        [
                            "id"       => "firstname",
                            "field"    => "firstname",
                            "input"    => QueryBuilderInputInterface::INPUT_TEXT,
                            "operator" => QueryBuilderOperatorInterface::OPERATOR_EQUAL,
                            "type"     => QueryBuilderTypeInterface::TYPE_STRING,
                            "value"    => "John",
                        ],
                        [
                            "id"       => "lastname",
                            "field"    => "lastname",
                            "input"    => QueryBuilderInputInterface::INPUT_NUMBER,
                            "operator" => QueryBuilderOperatorInterface::OPERATOR_EQUAL,
                            "type"     => QueryBuilderTypeInterface::TYPE_STRING,
                            "value"    => "DOE",
                        ],
                    ],
                ],
            ],
            "valid"     => true,
        ];
    }
}
