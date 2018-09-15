<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Exception;

use WBW\Bundle\JQuery\QueryBuilderBundle\Exception\QueryBuilderFileNotFoundException;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Cases\AbstractJQueryQueryBuilderFrameworkTestCase;

/**
 * jQuery QueryBuilder file not found exception test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Exception
 * @version 2.4.3
 * @final
 */
final class QueryBuilderFileNotFoundExceptionTest extends AbstractJQueryQueryBuilderFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new QueryBuilderFileNotFoundException("exception");

        $res = "The file \"exception\" was not found";
        $this->assertEquals($res, $obj->getMessage());
    }

}
