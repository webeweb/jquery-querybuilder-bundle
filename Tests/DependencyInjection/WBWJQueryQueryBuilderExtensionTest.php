<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\DependencyInjection;

use Exception;
use WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection\Configuration;
use WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection\WBWJQueryQueryBuilderExtension;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * QueryBuilder extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\DependencyInjection
 */
class WBWJQueryQueryBuilderExtensionTest extends AbstractTestCase {

    /**
     * Configs.
     *
     * @var array
     */
    private $configs;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a configs array mock.
        $this->configs = [
            WBWJQueryQueryBuilderExtension::EXTENSION_ALIAS => [],
        ];
    }

    /**
     * Tests the getAlias() method.
     *
     * @return void
     */
    public function testGetAlias() {

        $obj = new WBWJQueryQueryBuilderExtension();

        $this->assertEquals(WBWJQueryQueryBuilderExtension::EXTENSION_ALIAS, $obj->getAlias());
    }

    /**
     * Tests the getConfiguration() method.
     *
     * @return void
     */
    public function testGetConfiguration() {

        $obj = new WBWJQueryQueryBuilderExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Tests the load() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testLoad() {

        $obj = new WBWJQueryQueryBuilderExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("wbw_jquery_querybuilder", WBWJQueryQueryBuilderExtension::EXTENSION_ALIAS);
    }
}
