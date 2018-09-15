<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API;

use WBW\Bundle\JQuery\QueryBuilderBundle\API\QueryBuilderTypeInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Cases\AbstractJQueryQueryBuilderFrameworkTestCase;

/**
 * jQuery QueryBuilder type interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\API
 * @final
 */
final class QueryBuilderTypeInterfaceTest extends AbstractJQueryQueryBuilderFrameworkTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("boolean", QueryBuilderTypeInterface::TYPE_BOOLEAN);
        $this->assertEquals("date", QueryBuilderTypeInterface::TYPE_DATE);
        $this->assertEquals("datetime", QueryBuilderTypeInterface::TYPE_DATETIME);
        $this->assertEquals("double", QueryBuilderTypeInterface::TYPE_DOUBLE);
        $this->assertEquals("integer", QueryBuilderTypeInterface::TYPE_INTEGER);
        $this->assertEquals("string", QueryBuilderTypeInterface::TYPE_STRING);
        $this->assertEquals("time", QueryBuilderTypeInterface::TYPE_TIME);
    }

}
