<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\DependencyInjection;

use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection\JQueryQueryBuilderExtension;
use WBW\Bundle\JQuery\QueryBuilderBundle\Twig\Extension\QueryBuilderTwigExtension;

/**
 * jQuery QueryBuilder extension test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\DependencyInjection
 * @version 2.4.3
 * @final
 */
final class JQueryQueryBuilderExtensionTest extends PHPUnit_Framework_TestCase {

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
	 * Tests the load() method.
	 *
	 * @return void
	 */
	public function testLoad() {

		// We set a container builder with only the necessary.
		$container = new ContainerBuilder(new ParameterBag(["kernel.environment" => "dev"]));
		$container->set("kernel", $this);

		$obj = new JQueryQueryBuilderExtension();

		$obj->load([], $container);

		$this->assertInstanceOf(QueryBuilderTwigExtension::class, $container->get(QueryBuilderTwigExtension::SERVICE_NAME));
	}

}
