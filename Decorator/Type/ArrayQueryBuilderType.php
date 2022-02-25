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
use WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\QueryBuilderDecoratorFactory;
use WBW\Bundle\JQuery\QueryBuilderBundle\Model\QueryBuilderRule;

/**
 * Array QueryBuilder type.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type
 */
class ArrayQueryBuilderType extends AbstractQueryBuilderType {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(null);
    }

    /**
     * {@inheritDoc}
     */
    public function toSql(QueryBuilderRuleInterface $rule, bool $wrap = false): string {

        /** @var string[] $sql */
        $sql = [];

        foreach ($rule->getValue() as $current) {

            $qbd = QueryBuilderDecoratorFactory::newQueryBuilderType($rule->getType());

            $qbr = new QueryBuilderRule();
            $qbr->setType($rule->getType());
            $qbr->setValue($current);

            $sql[] = $qbd->toSql($qbr, $wrap);
        }

        return implode(self::DEFAULT_SEPARATOR, $sql);
    }
}
