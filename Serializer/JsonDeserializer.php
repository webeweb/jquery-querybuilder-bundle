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
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderRule;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderRuleSet;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * JSON deserializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Serializer
 */
class JsonDeserializer {

    /**
     * Deserialize a rule.
     *
     * @param QueryBuilderFilterSetInterface $filterSet The filter set.
     * @param array $data The data.
     * @return QueryBuilderRuleInterface Returns the de-normalized rule.
     * @throws InvalidArgumentException Throws an invalid argument exception if an argument is invalid.
     */
    public static function deserializeQueryBuilderRule(QueryBuilderFilterSetInterface $filterSet, array $data): QueryBuilderRuleInterface {

        $model = new QueryBuilderRule();
        $model->setId(ArrayHelper::get($data, SerializerKeys::ID));
        $model->setField(ArrayHelper::get($data, SerializerKeys::FIELD));
        $model->setInput(ArrayHelper::get($data, SerializerKeys::INPUT));
        $model->setOperator(ArrayHelper::get($data, SerializerKeys::OPERATOR));
        $model->setType(ArrayHelper::get($data, SerializerKeys::TYPE));
        $model->setValue(ArrayHelper::get($data, SerializerKeys::VALUE));

        $model->setDecorator($filterSet->getDecorator($model->getId()));

        return $model;
    }

    /**
     * Deserialize a rule set.
     *
     * @param QueryBuilderFilterSetInterface $filterSet The filter set.
     * @param array $data The data.
     * @return QueryBuilderRuleSetInterface Returns the rule set.
     * @throws InvalidArgumentException Throws an invalid argument exception if an argument is invalid.
     */
    public static function deserializeQueryBuilderRuleSet(QueryBuilderFilterSetInterface $filterSet, array $data): QueryBuilderRuleSetInterface {

        $model = new QueryBuilderRuleSet();
        $model->setCondition(ArrayHelper::get($data, SerializerKeys::CONDITION));
        $model->setValid(ArrayHelper::get($data, SerializerKeys::VALID, false));

        foreach (ArrayHelper::get($data, SerializerKeys::RULES, []) as $current) {

            // Rule set ?
            if (true === array_key_exists(SerializerKeys::CONDITION, $current)) {
                $model->addRuleSet(JsonDeserializer::deserializeQueryBuilderRuleSet($filterSet, $current));
                continue;
            }

            $model->addRule(JsonDeserializer::deserializeQueryBuilderRule($filterSet, $current));
        }

        return $model;
    }
}
