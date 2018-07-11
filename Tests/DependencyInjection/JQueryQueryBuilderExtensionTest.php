<?php

/**
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\DependencyInjection;

use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\HttpKernel\KernelInterface;
use WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection\JQueryQueryBuilderExtension;

/**
 * jQuery QueryBuilder extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\DependencyInjection
 * @version 2.4.3
 * @final
 */
final class JQueryQueryBuilderExtensionTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the load() method.
     *
     * @return void
     */
    public function testLoad() {

        // Set the mocks.
        $kernel = $this->getMockBuilder(KernelInterface::class)->getMock();

        // We set a container builder with only the necessary.
        $container = new ContainerBuilder(new ParameterBag(["kernel.environment" => "dev"]));
        $container->set("kernel", $kernel);

        $obj = new JQueryQueryBuilderExtension();

        $obj->load([], $container);
    }

}
