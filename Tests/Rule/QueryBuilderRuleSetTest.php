<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Rule;

use Exception;
use WBW\Bundle\JQuery\QueryBuilderBundle\Rule\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\Rule\QueryBuilderRuleSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractFrameworkTestCase;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * jQuery QueryBuilder rule set test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 * @final
 */
final class QueryBuilderRuleSetTest extends AbstractFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        // ===
        try {

            new QueryBuilderRuleSet(["condition" => "exception"], null);
        } catch (Exception $ex) {
            $this->assertInstanceOf(IllegalArgumentException::class, $ex);
            $this->assertEquals("The condition \"exception\" is invalid", $ex->getMessage());
        }

        // ===
        $obj = new QueryBuilderRuleSet([], null);

        $this->assertNull($obj->getCondition());
        $this->assertEquals([], $obj->getRules());
        $this->assertFalse($obj->getValid());
        $this->assertEquals("", $obj->toSQL());
    }

    /**
     * Tests the toSQL() method.
     *
     * @return void
     */
    public function testToSQL() {

        $rules = [
            "condition" => "OR",
            "rules"     => [
                ["id" => "age", "field" => "age", "input" => QueryBuilderRule::INPUT_NUMBER, "operator" => QueryBuilderRule::OPERATOR_GREATER, "type" => QueryBuilderRule::TYPE_INTEGER, "value" => "21"],
                [
                    "condition" => "AND",
                    "rules"     => [
                        ["id" => "firstname", "field" => "firstname", "input" => QueryBuilderRule::INPUT_TEXT, "operator" => QueryBuilderRule::OPERATOR_EQUAL, "type" => QueryBuilderRule::TYPE_STRING, "value" => "John"],
                        ["id" => "lastname", "field" => "lastname", "input" => QueryBuilderRule::INPUT_NUMBER, "operator" => QueryBuilderRule::OPERATOR_EQUAL, "type" => QueryBuilderRule::TYPE_STRING, "value" => "DOE"],
                    ],
                ],
            ],
            "valid"     => true,
        ];

        $obj = new QueryBuilderRuleSet($rules, null);

        $res = "(age > 21 OR (firstname = 'John' AND lastname = 'DOE'))";
        $this->assertEquals($res, $obj->toSQL());
    }

}
