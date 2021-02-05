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
 * Layout controller test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Controller
 */
class LayoutControllerTest extends AbstractWebTestCase {

    /**
     * Tests the javascriptsAction() method.
     *
     * @return void
     */
    public function testJavascriptsAction(): void {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/javascripts");
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
     * Tests the stylesheetsAction() method.
     *
     * @return void
     */
    public function testStylesheetsAction(): void {

        // Create a client.
        $client = static::createClient();

        // Make a GET request.
        $client->request("GET", "/stylesheets");
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
