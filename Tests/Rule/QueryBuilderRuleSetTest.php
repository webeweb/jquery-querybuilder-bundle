<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Rule;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\JQuery\QueryBuilderBundle\Rule\QueryBuilderRuleSet;

/**
 * jQuery QueryBuilder rule set test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Rule
 * @final
 */
final class QueryBuilderRuleSetTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     */
    public function testConstruct() {

        $obj = new QueryBuilderRuleSet([], null);

        $this->assertEquals(null, $obj->getCondition(), "The method getCondition() does not return the expected value");
        $this->assertEquals([], $obj->getRules(), "The method getRules() does not return the expected value");
        $this->assertEquals(false, $obj->getValid(), "The method getRules() does not return the expected value");
    }

}
