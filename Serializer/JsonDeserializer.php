<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Serializer;

use InvalidArgumentException;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSet;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderRuleSetInterface;
use WBW\Library\Core\Argument\Helper\ArrayHelper;

/**
 * JSON deserializer.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Serializer
 */
class JsonDeserializer {

    /**
     * Deserialize a rule.
     *
     * @param QueryBuilderFilterSetInterface $filterSet The filter set.
     * @param array $rule The rule.
     * @return QueryBuilderRuleInterface Returns the de-normalized rule.
     * @throws InvalidArgumentException Throws an invalid argument exception if an argument is invalid.
     */
    public static function deserializeQueryBuilderRule(QueryBuilderFilterSetInterface $filterSet, array $rule): QueryBuilderRuleInterface {

        $model = new QueryBuilderRule();
        $model->setId(ArrayHelper::get($rule, "id", null));
        $model->setField(ArrayHelper::get($rule, "field", null));
        $model->setInput(ArrayHelper::get($rule, "input", null));
        $model->setOperator(ArrayHelper::get($rule, "operator", null));
        $model->setType(ArrayHelper::get($rule, "type", null));
        $model->setValue(ArrayHelper::get($rule, "value", null));

        $model->setDecorator($filterSet->getDecorator($model->getId()));

        return $model;
    }

    /**
     * Deserialize a rule set.
     *
     * @param QueryBuilderFilterSetInterface $filterSet The filter set.
     * @param array $rules The rules.
     * @return QueryBuilderRuleSetInterface Returns the rule set.
     * @throws InvalidArgumentException Throws an invalid argument exception if an argument is invalid.
     */
    public static function deserializeQueryBuilderRuleSet(QueryBuilderFilterSetInterface $filterSet, array $rules): QueryBuilderRuleSetInterface {

        $model = new QueryBuilderRuleSet();
        $model->setCondition(ArrayHelper::get($rules, "condition", null));
        $model->setValid(ArrayHelper::get($rules, "valid", false));

        foreach (ArrayHelper::get($rules, "rules", []) as $current) {

            // Rule set ?
            if (true === array_key_exists("condition", $current)) {
                $model->addRuleSet(JsonDeserializer::deserializeQueryBuilderRuleSet($filterSet, $current));
                continue;
            }

            $model->addRule(JsonDeserializer::deserializeQueryBuilderRule($filterSet, $current));
        }

        return $model;
    }
}