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
use WBW\Bundle\CoreBundle\Tests\Fixtures\Helper\TestAssetsHelper;
use WBW\Bundle\JQuery\QueryBuilderBundle\QueryBuilderInterface;
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
        $this->directoryAssets = getcwd() . "/Resources/assets";
    }

    /**
     * Tests the listAssets() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testListAssets(): void {

        $res = TestAssetsHelper::listAssets($this->directoryAssets);
        $this->assertCount(2, $res);

        $this->assertRegexp("/interactjs\-.*\.zip$/", $res[0]);
        $this->assertRegexp("/jquery\-querybuilder\-" . QueryBuilderInterface::QUERYBUILDER_VERSION . ".*\.zip$/", $res[1]);
    }
}
