<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Normalizer;

use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderValidationInterface;
use WBW\Library\Core\Argument\ArrayHelper;

/**
 * QueryBuilder normalizer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Normalizer
 */
class QueryBuilderNormalizer {

    /**
     * Denormalize a rule.
     *
     * @param array $rule The rule.
     * @return QueryBuilderRuleInterface Returns the de-normalized rule.
     * @throws InvalidArgumentException Throws an invalid argument exception if an argument is invalid.
     */
    public static function denormalizeQueryBuilderRule(array $rule) {

        $model = new QueryBuilderRule();
        $model->setId(ArrayHelper::get($rule, "id", null));
        $model->setField(ArrayHelper::get($rule, "field", null));
        $model->setInput(ArrayHelper::get($rule, "input", null));
        $model->setOperator(ArrayHelper::get($rule, "operator", null));
        $model->setType(ArrayHelper::get($rule, "type", null));
        $model->setValue(ArrayHelper::get($rule, "value", null));

        return $model;
    }

    /**
     * Denormalize a rule set.
     *
     * @param array $rules The rules.
     * @return QueryBuilderRuleSetInterface Returns the rule set.
     * @throws InvalidArgumentException Throws an invalid argument exception if an argument is invalid.
     */
    public static function denormalizeQueryBuilderRuleSet(array $rules) {

        $model = new QueryBuilderRuleSet();
        $model->setCondition(ArrayHelper::get($rules, "condition", null));
        $model->setValid(ArrayHelper::get($rules, "valid", false));

        foreach (ArrayHelper::get($rules, "rules", []) as $current) {

            // Rule set ?
            if (true === array_key_exists("condition", $current)) {
                $model->addRuleSet(static::denormalizeQueryBuilderRuleSet($current));
                continue;
            }

            $model->addRule(static::denormalizeQueryBuilderRule($current));
        }

        return $model;
    }

    /**
     * Normalize a filter.
     *
     * @param QueryBuilderFilterInterface $filter The filter.
     * @return array Returns the normalized filter.
     */
    public static function normalizeQueryBuilderFilter(QueryBuilderFilterInterface $filter) {

        $output = [];

        ArrayHelper::set($output, "id", $filter->getId(), [null]);
        ArrayHelper::set($output, "field", $filter->getField(), [null]);
        ArrayHelper::set($output, "label", $filter->getLabel(), [null]);
        ArrayHelper::set($output, "type", $filter->getType(), [null]);
        ArrayHelper::set($output, "input", $filter->getInput(), [null]);
        ArrayHelper::set($output, "values", $filter->getValues(), [null]);
        ArrayHelper::set($output, "multiple", $filter->getMultiple(), [null, false]);

        if (null !== $filter->getValues()) {
            $output["validation"] = $filter->getValidation()->jsonSerialize();
        }

        ArrayHelper::set($output, "operators", $filter->getOperators(), [null, []]);

        return $output;
    }

    /**
     * Normalize a filter set.
     *
     * @param QueryBuilderFilterSetInterface $filterSet The filter set.
     * @return array Returns the normalized filter set.
     */
    public static function normalizeQueryBuilderFilterSet(QueryBuilderFilterSetInterface $filterSet) {

        $output = [];

        /** @var QueryBuilderFilterInterface $current */
        foreach ($filterSet->getFilters() as $current) {
            $output[] = static::normalizeQueryBuilderFilter($current);
        }

        return $output;
    }

    /**
     * Normalize a validation.
     *
     * @param QueryBuilderValidationInterface $validation The validation.
     * @return array Returns the normalized validation.
     */
    public static function normalizeQueryBuilderValidation(QueryBuilderValidationInterface $validation) {

        $output = [];

        ArrayHelper::set($output, "format", $validation->getFormat(), [null]);
        ArrayHelper::set($output, "min", $validation->getMin(), [null]);
        ArrayHelper::set($output, "max", $validation->getMax(), [null]);
        ArrayHelper::set($output, "step", $validation->getStep(), [null]);
        ArrayHelper::set($output, "messages", $validation->getMessages(), [null]);
        ArrayHelper::set($output, "allow_empty_value", $validation->getAllowEmptyValue(), [null]);
        ArrayHelper::set($output, "callback", $validation->getCallback(), [null]);

        return $output;
    }
}
