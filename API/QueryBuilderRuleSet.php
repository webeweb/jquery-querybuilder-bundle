<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\API;

use InvalidArgumentException;

/**
 * QueryBuilder rule set.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\API
 */
class QueryBuilderRuleSet implements QueryBuilderConditionInterface, QueryBuilderRuleSetInterface {

    /**
     * Condition.
     *
     * @var string
     */
    private $condition;

    /**
     * Rules.
     *
     * @var array
     */
    private $rules;

    /**
     * Valid.
     *
     * @var bool
     */
    private $valid;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setRules([]);
        $this->setValid(false);
    }

    /**
     * Add a rule.
     *
     * @param QueryBuilderRuleInterface $rule The rule.
     * @return QueryBuilderRuleSetInterface Returns this rule set.
     */
    public function addRule(QueryBuilderRuleInterface $rule) {
        $this->rules[] = $rule;
        return $this;
    }

    /**
     * Add a rule set.
     *
     * @param QueryBuilderRuleSetInterface $rule The rule.
     * @return QueryBuilderRuleSetInterface Returns this rule set.
     */
    public function addRuleSet(QueryBuilderRuleSetInterface $rule) {
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
     * @return array Returns the rules.
     */
    public function getRules() {
        return $this->rules;
    }

    /**
     * Get the valid.
     *
     * @return bool Returns the valid.
     */
    public function getValid() {
        return $this->valid;
    }

    /**
     * Set the condition.
     *
     * @param string $condition The condition.
     * @return QueryBuilderRuleSetInterface Returns this rule set.
     * @throws InvalidArgumentException Throws an invalid argument exception if the condition is invalid.
     */
    public function setCondition($condition) {
        if (null !== $condition && false === in_array($condition, QueryBuilderEnumerator::enumConditions())) {
            throw new InvalidArgumentException(sprintf("The condition \"%s\" is invalid", $condition));
        }
        $this->condition = $condition;
        return $this;
    }

    /**
     * Set the rules.
     *
     * @param array $rules The rules.
     * @return QueryBuilderRuleSet Returns this rule set.
     */
    protected function setRules(array $rules) {
        $this->rules = $rules;
        return $this;
    }

    /**
     * Set the valid.
     *
     * @param bool $valid The valid.
     * @return QueryBuilderRuleSetInterface Returns this rule set.
     */
    public function setValid($valid) {
        $this->valid = $valid;
        return $this;
    }
}
