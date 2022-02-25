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
     * @param QueryBuilderFilterInterface $filter The filter.
     * @return array Returns the serialized filter.
     */
    public static function serializeQueryBuilderFilter(QueryBuilderFilterInterface $filter): array {

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
     * Serialize a filter set.
     *
     * @param QueryBuilderFilterSetInterface $filterSet The filter set.
     * @return array Returns the serialized filter set.
     */
    public static function serializeQueryBuilderFilterSet(QueryBuilderFilterSetInterface $filterSet): array {

        $output = [];

        foreach ($filterSet->getFilters() as $current) {
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
