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

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderDecoratorInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;

/**
 * Abstract QueryBuilder type.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Decorator\Type
 * @abstract
 */
abstract class AbstractQueryBuilderType implements QueryBuilderDecoratorInterface, QueryBuilderTypeInterface {

    /**
     * Type.
     *
     * @var string
     */
    private $type;

    /**
     * Constructor.
     *
     * @param string $type The type.
     */
    protected function __construct($type) {
        $this->setType($type);
    }

    /**
     * Get the type.
     *
     * @return string Returns the type.
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set the type.
     *
     * @param string $type The type
     * @return AbstractQueryBuilderType Returns this type.
     */
    protected function setType($type) {
        $this->type = $type;
        return $this;
    }
}
