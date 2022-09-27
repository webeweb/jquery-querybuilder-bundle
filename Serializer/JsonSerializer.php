<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Serializer;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderFilterInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderFilterSetInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderValidationInterface;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * JSON serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Serializer
 */
class JsonSerializer {

    /**
     * Serialize a filter.
     *
     * @param QueryBuilderFilterInterface $model The filter.
     * @return array Returns the serialized filter.
     */
    public static function serializeQueryBuilderFilter(QueryBuilderFilterInterface $model): array {

        $output = [];

        ArrayHelper::set($output, SerializerKeys::ID, $model->getId(), [null]);
        ArrayHelper::set($output, SerializerKeys::FIELD, $model->getField(), [null]);
        ArrayHelper::set($output, SerializerKeys::LABEL, $model->getLabel(), [null]);
        ArrayHelper::set($output, SerializerKeys::TYPE, $model->getType(), [null]);
        ArrayHelper::set($output, SerializerKeys::INPUT, $model->getInput(), [null]);
        ArrayHelper::set($output, SerializerKeys::VALUES, $model->getValues(), [null]);
        ArrayHelper::set($output, SerializerKeys::MULTIPLE, $model->getMultiple(), [null, false]);

        if (null !== $model->getValues()) {
            $output[SerializerKeys::VALIDATION] = $model->getValidation()->jsonSerialize();
        }

        ArrayHelper::set($output, SerializerKeys::OPERATORS, $model->getOperators(), [null, []]);

        return $output;
    }

    /**
     * Serialize a filter set.
     *
     * @param QueryBuilderFilterSetInterface $model The filter set.
     * @return array Returns the serialized filter set.
     */
    public static function serializeQueryBuilderFilterSet(QueryBuilderFilterSetInterface $model): array {

        $output = [];

        foreach ($model->getFilters() as $current) {
            $output[] = static::serializeQueryBuilderFilter($current);
        }

        return $output;
    }

    /**
     * Serialize a validation.
     *
     * @param QueryBuilderValidationInterface $validation The validation.
     * @return array Returns the serialized validation.
     */
    public static function serializeQueryBuilderValidation(QueryBuilderValidationInterface $validation): array {

        $output = [];

        ArrayHelper::set($output, SerializerKeys::FORMAT, $validation->getFormat(), [null]);
        ArrayHelper::set($output, SerializerKeys::MIN, $validation->getMin(), [null]);
        ArrayHelper::set($output, SerializerKeys::MAX, $validation->getMax(), [null]);
        ArrayHelper::set($output, SerializerKeys::STEP, $validation->getStep(), [null]);
        ArrayHelper::set($output, SerializerKeys::MESSAGES, $validation->getMessages(), [null]);
        ArrayHelper::set($output, SerializerKeys::ALLOW_EMPTY_VALUE, $validation->getAllowEmptyValue(), [null]);
        ArrayHelper::set($output, SerializerKeys::CALLBACK, $validation->getCallback(), [null]);

        return $output;
    }
}
