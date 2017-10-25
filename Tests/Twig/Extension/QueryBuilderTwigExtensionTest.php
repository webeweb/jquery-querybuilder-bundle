<?php

/*
 * This file is part of the WBWJQueryQueryBuilderBundle package.
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

        $this->assertCount(2, $obj->getFunctions(), "The method getFunctions() does not return the expected count");

        $this->assertInstanceOf(Twig_SimpleFunction::class, $obj->getFunctions()[0], "The method getFunctions() does not return the expected object on item 0");
        $this->assertEquals("queryBuilderScript", $obj->getFunctions()[0]->getName(), "The method getName() does not return the expected name on item 0");
        $this->assertEquals([$obj, "queryBuilderScriptFunction"], $obj->getFunctions()[0]->getCallable(), "The method getCallable() does not return the expected callable on item 0");
        $this->assertEquals(["html"], $obj->getFunctions()[0]->getSafe(new Twig_Node()), "The method getSafe() does not return the expected safe on item 0");

        $this->assertInstanceOf(Twig_SimpleFunction::class, $obj->getFunctions()[1], "The method getFunctions() does not return the expected object on item 1");
        $this->assertEquals("queryBuilderStyle", $obj->getFunctions()[1]->getName(), "The method getName() does not return the expected name on item 1");
        $this->assertEquals([$obj, "queryBuilderStyleFunction"], $obj->getFunctions()[1]->getCallable(), "The method getCallable() does not return the expected callable on item 1");
        $this->assertEquals(["html"], $obj->getFunctions()[1]->getSafe(new Twig_Node()), "The method getSafe() does not return the expected safe on item 1");
    }

    /**
     * Tests the queryBuilderScriptFunction() method.
     *
     * @return void
     */
    public function testQueryBuilerScriptFunction() {

        $obj = new QueryBuilderTwigExtension(getcwd(), "");

        try {
            $obj->queryBuilderScriptFunction("inexistant-script");
        } catch (Exception $ex) {
            $this->assertInstanceOf(FileNotFoundException::class, $ex, "The method queryBuilderScriptFunction() does not throw the expected exception");
            $this->assertEquals("The file \"js/inexistant-script.js\" is not found", $ex->getMessage(), "The method getMessage() does not return the expected string");
        }

        $res1 = "<script src=\"/bundles/wbwjquery-querybuilder/js/query-builder.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res1, $obj->queryBuilderScriptFunction("query-builder"), "The method queryBuilderScriptFunction() does not return the expected string");

        $res1_1 = "<script src=\"/bundles/wbwjquery-querybuilder/js/query-builder.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res1_1, $obj->queryBuilderScriptFunction("query-builder"), "The method queryBuilderScriptFunction() does not return the expected string");

        $res2 = "<script src=\"/bundles/wbwjquery-querybuilder/js/interact.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res2, $obj->queryBuilderScriptFunction("interact", "js"), "The method queryBuilderScriptFunction() does not return the expected string");

        $res2_1 = "<script src=\"/bundles/wbwjquery-querybuilder/js/interact.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res2_1, $obj->queryBuilderScriptFunction("interact"), "The method queryBuilderScriptFunction() does not return the expected string");

        $res3 = "<script src=\"/bundles/wbwjquery-querybuilder/i18n/query-builder.en.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res3, $obj->queryBuilderScriptFunction("query-builder.en", "i18n"), "The method queryBuilderScriptFunction() does not return the expected string");
    }

    /**
     * Tests the queryBuilderStyleFunction() method.
     *
     * @return void
     */
    public function testQueryBuilderStyleFunction() {

        $obj = new QueryBuilderTwigExtension(getcwd(), "");

        try {
            $obj->queryBuilderStyleFunction("inexistant-style");
        } catch (Exception $ex) {
            $this->assertInstanceOf(FileNotFoundException::class, $ex, "The method queryBuilderStyleFunction() does not throw the expected exception");
            $this->assertEquals("The file \"css/inexistant-style.css\" is not found", $ex->getMessage(), "The method getMessage() does not return the expected string");
        }

        $res1 = "<link href=\"/bundles/wbwjquery-querybuilder/css/query-builder.default.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($res1, $obj->queryBuilderStyleFunction("query-builder.default"), "The method queryBuilderStyleFunction() does not return the expected string");

        $res2 = "<link href=\"/bundles/wbwjquery-querybuilder/css/query-builder.dark.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($res2, $obj->queryBuilderStyleFunction("query-builder.dark"), "The method queryBuilderStyleFunction() does not return the expected string");
    }

}
