<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Rule;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\Condition\QueryBuilderConditionInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\Filter\QueryBuilderFilterSet;
use WBW\Library\Core\Exception\Argument\IllegalArgumentException;

/**
 * jQuery QueryBuilder rule set.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 * @final
 */
final class QueryBuilderRuleSet implements QueryBuilderConditionInterface, QueryBuilderRuleInterface {

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
     */
    public function __construct(array $rules = [], QueryBuilderFilterSet $queryBuilderFilterSet = null) {
        $this->filterSet = $queryBuilderFilterSet;
        $this->parse($rules);
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
     */
    private function parse(array $rules = []) {

        // Check if condition exists.
        if (array_key_exists("condition", $rules)) {
            $this->setCondition($rules["condition"]);
        }

        // Check if rules exists.
        if (array_key_exists("rules", $rules)) {

            // Handle each rule.
            foreach ($rules["rules"] as $current) {

                // Check if condition exists.
                if (array_key_exists("condition", $current)) {

                    // Build a QueryBuilder rule set.
                    $this->rules[] = new QueryBuilderRuleSet($current, $this->filterSet);
                    continue;
                }

                // Set the decorator.
                $decorator = !is_null($this->filterSet) ? $this->filterSet->getDecorator($current["id"]) : null;

                // Build a QueryBuilder rule.
                $this->rules[] = new QueryBuilderRule($current, $decorator);
            }
        }

        // Check if valid exists.
        if (array_key_exists("valid", $rules)) {
            $this->setValid($rules["valid"]);
        }
    }

    /**
     * Set the condition.
     *
     * @param string $condition The condition.
     * @return QueryBuilderRuleSet Returns the jQuery QueryBuilder rule set.
     * @throws IllegalArgumentException Throws an illegal argument exception if the condition is is invalid.
     */
    protected function setCondition($condition) {
        if (!in_array($condition, self::CONDITIONS)) {
            throw new IllegalArgumentException("The condition \"" . $condition . "\" is invalid");
        }
        $this->condition = $condition;
        return $this;
    }

    /**
     * Set the rules.
     *
     * @param QueryBuilderRuleInterface[] $rules The rules.
     * @return QueryBuilderRuleSet Returns the jQuery QueryBuilder rule set.
     */
    protected function setRules(array $rules = []) {
        $this->rules = $rules;
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
        if (count($this->rules) === 0) {
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
