<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Helper;

use Exception;
use WBW\Bundle\CoreBundle\DependencyInjection\ConfigurationHelper;
use WBW\Bundle\CoreBundle\Tests\Fixtures\Helper\TestAssetsHelper;
use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractTestCase;

/**
 * Assets helper test
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Helper
 */
class AssetsHelperTest extends AbstractTestCase {

    /**
     * Directory "assets".
     *
     * @var string
     */
    private $directoryAssets;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set the directories.
        $this->directoryAssets = realpath(__DIR__ . "/../../Resources/assets");
    }

    /**
     * Tests listAssets()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testListAssets(): void {

        // Load the YAML configuration.
        $config  = ConfigurationHelper::loadYamlConfig(getcwd() . "/DependencyInjection", "assets");
        $plugins = $config["assets"]["wbw.jquery_querybuilder.asset.jquery_querybuilder"];

        $res = TestAssetsHelper::listAssets($this->directoryAssets);
        $this->assertCount(2, $res);

        $i = -1;

        $this->assertRegexp("/interactjs\-" . preg_quote($plugins["requires"]["interactjs"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegexp("/jquery\-querybuilder\-" . preg_quote($plugins["version"]) . "\.zip$/", $res[++$i]);
    }
}
