<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Rule;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * jQuery QueryBuilder rule set.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 */
class QueryBuilderRuleSet implements QueryBuilderConditionInterface, QueryBuilderRuleInterface {

    /**
     * Parse.
     *
     * @param array $rules The rules.
     * @throws IllegalArgumentException Throws an illegal argument exception if an argument is invalid.
     */
    private function parse(array $rules = []) {

        // Check if condition exists.
        if (true === array_key_exists("condition", $rules)) {
            $this->setCondition($rules["condition"]);
        }

        // Check if rules exists.
        if (true === array_key_exists("rules", $rules)) {

            // Handle each rule.
            foreach ($rules["rules"] as $current) {

                // Check if condition exists.
                if (true === array_key_exists("condition", $current)) {

                    // Build a QueryBuilder rule set.
                    $this->addRule(new QueryBuilderRuleSet($current, $this->filterSet));
                    continue;
                }

                // Set the decorator.
                $decorator = null !== $this->filterSet ? $this->filterSet->getDecorator($current["id"]) : null;

                // Build a QueryBuilder rule.
                $this->addRule(new QueryBuilderRule($current, $decorator));
            }
        }

        // Check if valid exists.
        if (true === array_key_exists("valid", $rules)) {
            $this->setValid($rules["valid"]);
        }
    }
}
