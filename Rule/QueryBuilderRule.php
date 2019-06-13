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
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderOperatorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Data\AbstractQueryBuilderData;
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorInterface;

/**
 * jQuery QueryBuilder rule.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 */
class QueryBuilderRule extends AbstractQueryBuilderData implements QueryBuilderConditionInterface, QueryBuilderOperatorInterface, QueryBuilderRuleInterface {

    /**
     * {@inheritdoc}
     */
    public function toSQL() {

        // Check the decorator.
        if (null !== $this->decorator) {
            return $this->decorator->toSQL($this);
        }

        // Initialize the SQL.
        $sql   = [];
        $sql[] = $this->getField();
        $sql[] = self::OPERATORS[$this->operator];

        // Switch into operator.
        switch ($this->operator) {

            case self::OPERATOR_BEGINS_WITH:
            case self::OPERATOR_NOT_BEGINS_WITH:
                $sql[] = "'" . $this->quoteMixed($this->value, false) . "%'";
                break;

            case self::OPERATOR_BETWEEN:
            case self::OPERATOR_NOT_BETWEEN:
                $sql[] = implode(" " . self::CONDITION_AND . " ", $this->quoteArray($this->value, true));
                break;

            case self::OPERATOR_CONTAINS:
            case self::OPERATOR_NOT_CONTAINS:
                $sql[] = "'%" . $this->quoteMixed($this->value, false) . "%'";
                break;

            case self::OPERATOR_ENDS_WITH:
            case self::OPERATOR_NOT_ENDS_WITH:
                $sql[] = "'%" . $this->quoteMixed($this->value, false) . "'";
                break;

            case self::OPERATOR_EQUAL:
            case self::OPERATOR_GREATER:
            case self::OPERATOR_GREATER_OR_EQUAL:
            case self::OPERATOR_LESS:
            case self::OPERATOR_LESS_OR_EQUAL:
            case self::OPERATOR_NOT_EQUAL:
                $sql[] = $this->quoteMixed($this->value, true);
                break;

            case self::OPERATOR_IN:
            case self::OPERATOR_NOT_IN:
                $sql[] = "(" . implode(", ", $this->quoteArray($this->value, true)) . ")";
                break;

            case self::OPERATOR_IS_EMPTY:
            case self::OPERATOR_IS_NOT_EMPTY:
            case self::OPERATOR_IS_NOT_NULL:
            case self::OPERATOR_IS_NULL:
                // NOTHING TO DO.
                break;
        }

        // Return the SQL.
        return implode(" ", $sql);
    }
}
