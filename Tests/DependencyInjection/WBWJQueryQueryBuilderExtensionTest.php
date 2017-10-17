<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
 *
 * (c) 2017 WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\JQuery\QueryBuilderBundle\Tests\DependencyInjection;

use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use WBW\JQuery\QueryBuilderBundle\DependencyInjection\WBWJQueryQueryBuilderExtension;
use WBW\JQuery\QueryBuilderBundle\Twig\Extension\QueryBuilderTwigExtension;

/**
 * jQuery QueryBuilder extension test.
 *
 * @author WBW <https://github.com/webeweb/WBWJQueryQueryBuilderBundle>
 * @package WBW\JQuery\QueryBuilderBundle\Tests\DependencyInjection
 * @version 2.4.3
 * @final
 */
final class WBWJQueryQueryBuilderExtensionTest extends PHPUnit_Framework_TestCase {

    /**
     * Locate a resource.
     *
     * @param string $resource The resource.
     * @return string Returns a resource path.
     */
    public function locateResource($resource) {
        return "";
    }

    /**
     * Test the load() method.
     *
     * @return void
     */
    public function testLoad() {

        // We set a container builder with only the necessary.
        $container = new ContainerBuilder(new ParameterBag(["kernel.environment" => "dev"]));
        $container->set("kernel", $this);

        $obj = new WBWJQueryQueryBuilderExtension();

        $obj->load([], $container);

        $this->assertInstanceOf(QueryBuilderTwigExtension::class, $container->get(QueryBuilderTwigExtension::SERVICE_NAME), "The method load() does not load the expected service");
    }

}
