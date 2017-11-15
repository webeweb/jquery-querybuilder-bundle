<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Twig\Extension;

use Exception;
use PHPUnit_Framework_TestCase;
use Twig_Node;
use Twig_SimpleFunction;
use WBW\Bundle\JQuery\QueryBuilderBundle\Twig\Extension\QueryBuilderTwigExtension;
use WBW\Library\Core\Exception\File\FileNotFoundException;

/**
 * jQuery QueryBuilder Twig extension test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\Tests\Twig\Extension
 * @version 2.4.3
 * @final
 */
final class QueryBuilderTwigExtensionTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the getFunctions() method.
	 *
	 * @return void
	 */
	public function testGetFunctions() {

		$obj = new QueryBuilderTwigExtension(getcwd(), "");

		$this->assertCount(2, $obj->getFunctions());

		$this->assertInstanceOf(Twig_SimpleFunction::class, $obj->getFunctions()[0]);
		$this->assertEquals("queryBuilderScript", $obj->getFunctions()[0]->getName());
		$this->assertEquals([$obj, "queryBuilderScriptFunction"], $obj->getFunctions()[0]->getCallable());
		$this->assertEquals(["html"], $obj->getFunctions()[0]->getSafe(new Twig_Node()));

		$this->assertInstanceOf(Twig_SimpleFunction::class, $obj->getFunctions()[1]);
		$this->assertEquals("queryBuilderStyle", $obj->getFunctions()[1]->getName());
		$this->assertEquals([$obj, "queryBuilderStyleFunction"], $obj->getFunctions()[1]->getCallable());
		$this->assertEquals(["html"], $obj->getFunctions()[1]->getSafe(new Twig_Node()));
	}

	/**
	 * Tests the queryBuilderScriptFunction() method.
	 *
	 * @return void
	 */
	public function testQueryBuilderScriptFunction() {

		$obj = new QueryBuilderTwigExtension(getcwd(), "");

		try {
			$obj->queryBuilderScriptFunction("exception");
		} catch (Exception $ex) {
			$this->assertInstanceOf(FileNotFoundException::class, $ex);
			$this->assertEquals("The file \"js/exception.js\" is not found", $ex->getMessage());
		}

		$res1 = "<script src=\"/bundles/jqueryquerybuilder/js/query-builder.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($res1, $obj->queryBuilderScriptFunction("query-builder"));

		$res1_1 = "<script src=\"/bundles/jqueryquerybuilder/js/query-builder.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($res1_1, $obj->queryBuilderScriptFunction("query-builder"));

		$res2 = "<script src=\"/bundles/jqueryquerybuilder/js/interact.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($res2, $obj->queryBuilderScriptFunction("interact", "js"));

		$res2_1 = "<script src=\"/bundles/jqueryquerybuilder/js/interact.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($res2_1, $obj->queryBuilderScriptFunction("interact"));

		$res3 = "<script src=\"/bundles/jqueryquerybuilder/i18n/query-builder.en.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($res3, $obj->queryBuilderScriptFunction("query-builder.en", "i18n"));
	}

	/**
	 * Tests the queryBuilderStyleFunction() method.
	 *
	 * @return void
	 */
	public function testQueryBuilderStyleFunction() {

		$obj = new QueryBuilderTwigExtension(getcwd(), "");

		try {
			$obj->queryBuilderStyleFunction("exception");
		} catch (Exception $ex) {
			$this->assertInstanceOf(FileNotFoundException::class, $ex);
			$this->assertEquals("The file \"css/exception.css\" is not found", $ex->getMessage());
		}

		$res1 = "<link href=\"/bundles/jqueryquerybuilder/css/query-builder.default.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($res1, $obj->queryBuilderStyleFunction("query-builder.default"));

		$res2 = "<link href=\"/bundles/jqueryquerybuilder/css/query-builder.dark.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($res2, $obj->queryBuilderStyleFunction("query-builder.dark"));
	}

}
