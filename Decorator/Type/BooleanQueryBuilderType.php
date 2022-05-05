<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type;

use WBW\Bundle\JQuery\QueryBuilderBundle\Api\QueryBuilderRuleInterface;
use WBW\Library\Types\Helper\IntegerHelper;

/**
 * Boolean QueryBuilder type.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type
 */
class BooleanQueryBuilderType extends AbstractQueryBuilderType {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::TYPE_BOOLEAN);
    }

    /**
     * {@inheritdoc}
     */
    public function toSql(QueryBuilderRuleInterface $rule, bool $wrap = false): string {
        return sprintf("%d", IntegerHelper::parseBoolean($rule->getValue()));
    }
}
