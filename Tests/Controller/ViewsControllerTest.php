<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Controller;

use WBW\Bundle\JQuery\QueryBuilderBundle\Tests\AbstractWebTestCase;

/**
 * Views controller test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Controller
 */
class ViewsControllerTest extends AbstractWebTestCase {

    /**
     * Tests assetsJavascriptsAction()
     *
     * @return void
     */
    public function testAssetsJavascriptsAction(): void {

        // Create a client.
        $client = $this->client;

        // Make a GET request.
        $client->request("GET", "/assets/javascripts");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        // Get the response content.
        $content = $client->getResponse()->getContent();

        // Check the Javascript.
        foreach (static::listJavascriptAssets() as $current) {
            $this->assertRegExp("/" . preg_quote($current, "/") . "/", $content);
        }
    }

    /**
     * Tests assetsStylesheetsAction()
     *
     * @return void
     */
    public function testAssetsStylesheetsAction(): void {

        // Create a client.
        $client = $this->client;

        // Make a GET request.
        $client->request("GET", "/assets/stylesheets");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals("text/html; charset=UTF-8", $client->getResponse()->headers->get("Content-Type"));

        // Get the response content.
        $content = $client->getResponse()->getContent();

        // Check the CSS.
        foreach (static::listCSSAssets() as $current) {
            $this->assertRegExp("/" . preg_quote($current, "/") . "/", $content);
        }
    }
}