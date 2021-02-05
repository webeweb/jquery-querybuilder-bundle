<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests;

use WBW\Bundle\CoreBundle\DependencyInjection\ConfigurationHelper;
use WBW\Bundle\CoreBundle\Tests\AbstractWebTestCase as WebTestCase;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests
 * @abstract
 */
abstract class AbstractWebTestCase extends WebTestCase {

    /**
     * Lists CSS assets.
     *
     * @return string[] Returns the CSS assets list.
     */
    public static function listCSSAssets(): array {

        // Load the YAML configuration.
        $config  = ConfigurationHelper::loadYamlConfig(getcwd() . "/DependencyInjection", "assets");
        $version = $config["assets"]["wbw.jquery_querybuilder.asset.jquery_querybuilder"]["version"];

        $assets = [];

        $assets[] = 'href="/bundles/wbwjqueryquerybuilder/jquery-querybuilder-' . $version . '/css/query-builder.dark.min.css"';

        return $assets;
    }

    /**
     * Lists Javascript assets.
     *
     * @return string[] Returns the Javascript assets list.
     */
    public static function listJavascriptAssets(): array {

        // Load the YAML configuration.
        $config   = ConfigurationHelper::loadYamlConfig(getcwd() . "/DependencyInjection", "assets");
        $version  = $config["assets"]["wbw.jquery_querybuilder.asset.jquery_querybuilder"]["version"];
        $requires  = $config["assets"]["wbw.jquery_querybuilder.asset.jquery_querybuilder"]["requires"];

        $assets = [];

        $assets[] = 'src="/bundles/wbwjqueryquerybuilder/interactjs-' . $requires["interactjs"]["version"] . '/interact.min.js"';
        $assets[] = 'src="/bundles/wbwjqueryquerybuilder/jquery-querybuilder-' . $version . '/js/query-builder.standalone.min.js"';
        $assets[] = 'src="/bundles/wbwjqueryquerybuilder/jquery-querybuilder-' . $version . '/i18n/query-builder.fr.js';

        return $assets;
    }
}
