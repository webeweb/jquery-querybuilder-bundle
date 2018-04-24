<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Exception;

/**
 * jQuery QueryBuilder file not found exception.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Exception
 */
class QueryBuilderFileNotFoundException extends AbstractQueryBuilderException {

    /**
     * Constructor.
     *
     * @param string $filename The file name.
     */
    public function __construct($filename) {
        parent::__construct("The file \"" . $filename . "\" was not found");
    }

}
