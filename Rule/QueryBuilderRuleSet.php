<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Rule;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterSet;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * jQuery QueryBuilder rule set.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 */
class QueryBuilderRuleSet implements QueryBuilderConditionInterface, QueryBuilderRuleInterface {

    /**
     * Condition.
     *
     * @var string
     */
    private $condition;

    /**
     * Filter set.
     *
     * @var QueryBuilderFilterSet
     */
    private $filterSet;

    /**
     * Rules.
     *
     * @var QueryBuilderRuleInterface[]
     */
    private $rules = [];

    /**
     * Valid.
     *
     * @var boolean
     */
    private $valid = false;

    /**
     * Constructor.
     *
     * @param array $rules The rules.
     * @param QueryBuilderFilterSet The query builder filter set.
     * @throws IllegalArgumentException Throws an illegal argument exception if an argument is invalid.
     */
    public function __construct(array $rules = [], QueryBuilderFilterSet $filterSet = null) {
        $this->filterSet = $filterSet;
        $this->parse($rules);
    }

    /**
     * Add a rule.
     *
     * @param QueryBuilderRuleInterface $rule The rule.
     * @return QueryBuilderRuleSet Returns the jQuery QueryBuilder rule set.
     */
    protected function addRule(QueryBuilderRuleInterface $rule) {
        $this->rules[] = $rule;
        return $this;
    }

    /**
     * Get the condition.
     *
     * @return string Returns the condition.
     */
    public function getCondition() {
        return $this->condition;
    }

    /**
     * Get the rules.
     *
     * @return QueryBuilderRuleInterface[] Returns the rules.
     */
    public function getRules() {
        return $this->rules;
    }

    /**
     * Get the valid.
     *
     * @return boolean Returns the valid.
     */
    public function getValid() {
        return $this->valid;
    }

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

    /**
     * Set the condition.
     *
     * @param string $condition The condition.
     * @return QueryBuilderRuleSet Returns the jQuery QueryBuilder rule set.
     * @throws IllegalArgumentException Throws an illegal argument exception if the condition is invalid.
     */
    protected function setCondition($condition) {
        if (null !== $condition && false === in_array($condition, self::CONDITIONS)) {
            throw new IllegalArgumentException("The condition \"" . $condition . "\" is invalid");
        }
        $this->condition = $condition;
        return $this;
    }

    /**
     * Set the valid.
     *
     * @param boolean $valid The valid.
     * @return QueryBuilderRuleSet Returns the jQuery QueryBuilder rule set.
     */
    protected function setValid($valid) {
        $this->valid = $valid;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toSQL() {

        // Check the rules.
        if (0 === count($this->rules)) {
            return "";
        }

        // Initialize the SQL.
        $sql = [];

        // Handle each rule.
        foreach ($this->rules as $rule) {
            $sql[] = $rule->toSQL();
        }

        // Return the SQL.
        return "(" . implode(" " . $this->condition . " ", $sql) . ")";
    }

}
