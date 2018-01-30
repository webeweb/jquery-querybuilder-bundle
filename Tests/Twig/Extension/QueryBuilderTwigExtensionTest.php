<?php

/**
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
            $this->assertEquals("The file \"jquery-querybuilder-2.4.3/js/exception.js\" is not found", $ex->getMessage());
        }

        $res1_1 = "<script src=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/js/query-builder.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res1_1, $obj->queryBuilderScriptFunction("query-builder"));

        $res1_2 = "<script src=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/js/query-builder.min.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res1_2, $obj->queryBuilderScriptFunction("query-builder.min"));

        $res1_3 = "<script src=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/js/query-builder.standalone.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res1_3, $obj->queryBuilderScriptFunction("query-builder.standalone"));

        $res1_4 = "<script src=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/js/query-builder.standalone.min.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res1_4, $obj->queryBuilderScriptFunction("query-builder.standalone.min"));

        $res2_1 = "<script src=\"/bundles/jqueryquerybuilder/jquery-3.2.1/jquery-3.2.1.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res2_1, $obj->queryBuilderScriptFunction("jquery-3.2.1", "jquery-3.2.1"));

        $res2_2 = "<script src=\"/bundles/jqueryquerybuilder/jquery-3.2.1/jquery-3.2.1.min.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res2_2, $obj->queryBuilderScriptFunction("jquery-3.2.1.min", "jquery-3.2.1"));

        $res3_1 = "<script src=\"/bundles/jqueryquerybuilder/interactjs-1.3.3/interact.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res3_1, $obj->queryBuilderScriptFunction("interact", "interactjs-1.3.3"));

        $res3_2 = "<script src=\"/bundles/jqueryquerybuilder/interactjs-1.3.3/interact.min.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res3_2, $obj->queryBuilderScriptFunction("interact.min", "interactjs-1.3.3"));

        $res4_1 = "<script src=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/i18n/query-builder.en.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res4_1, $obj->queryBuilderScriptFunction("query-builder.en", "jquery-querybuilder-2.4.3/i18n"));

        $res4_2 = "<script src=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/i18n/query-builder.fr.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res4_2, $obj->queryBuilderScriptFunction("query-builder.fr", "jquery-querybuilder-2.4.3/i18n"));
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
            $this->assertEquals("The file \"jquery-querybuilder-2.4.3/css/exception.css\" is not found", $ex->getMessage());
        }

        $res1_1 = "<link href=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/css/query-builder.default.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($res1_1, $obj->queryBuilderStyleFunction("query-builder.default"));

        $res1_2 = "<link href=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/css/query-builder.default.min.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($res1_2, $obj->queryBuilderStyleFunction("query-builder.default.min"));

        $res2_1 = "<link href=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/css/query-builder.dark.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($res2_1, $obj->queryBuilderStyleFunction("query-builder.dark"));

        $res2_2 = "<link href=\"/bundles/jqueryquerybuilder/jquery-querybuilder-2.4.3/css/query-builder.dark.min.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($res2_2, $obj->queryBuilderStyleFunction("query-builder.dark.min"));
    }

}
