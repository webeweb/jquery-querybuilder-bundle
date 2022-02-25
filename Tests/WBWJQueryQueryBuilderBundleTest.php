<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests;

use WBW\Bundle\CoreBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection\WBWJQueryQueryBuilderExtension;
use WBW\Bundle\JQuery\QueryBuilderBundle\WBWJQueryQueryBuilderBundle;

/**
 * jQuery QueryBuilder bundle test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests
 */
class WBWJQueryQueryBuilderBundleTest extends AbstractTestCase {

    /**
     * Tests build()
     *
     * @return void
     */
    public function testBuild(): void {

        $obj = new WBWJQueryQueryBuilderBundle();

        $this->assertNull($obj->build($this->containerBuilder));
    }

    /**
     * Tests getAssetsRelativeDirectory()
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory(): void {

        $obj = new WBWJQueryQueryBuilderBundle();

        $this->assertEquals(AssetsProviderInterface::ASSETS_RELATIVE_DIRECTORY, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Tests getContainerExtension()
     *
     * @return void
     */
    public function testGetContainerExtension(): void {

        $obj = new WBWJQueryQueryBuilderBundle();

        $this->assertInstanceOf(WBWJQueryQueryBuilderExtension::class, $obj->getContainerExtension());
    }
}
