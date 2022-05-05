<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * (c) 2019 All rights reserved.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;

/**
 * Configuration.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder {

        $assets  = ConfigurationHelper::loadYamlConfig(__DIR__, "assets");
        $locales = $assets["assets"]["wbw.jquery_querybuilder.asset.jquery_querybuilder"]["locales"];
        $themes  = $assets["assets"]["wbw.jquery_querybuilder.asset.jquery_querybuilder"]["themes"];

        $treeBuilder = new TreeBuilder(WBWJQueryQueryBuilderExtension::EXTENSION_ALIAS);

        $rootNode = ConfigurationHelper::getRootNode($treeBuilder, WBWJQueryQueryBuilderExtension::EXTENSION_ALIAS);
        $rootNode
            ->children()
                ->variableNode("locale")->defaultValue("en")->info("jQuery QueryBuilder locale")
                    ->validate()
                        ->ifNotInArray($locales)
                        ->thenInvalid("The jQuery QueryBuilder locale %s is not supported. Please choose one of " . json_encode($locales))
                    ->end()
                ->end()
                ->variableNode("theme")->defaultValue("default")->info("jQuery QueryBuilder theme")
                    ->validate()
                        ->ifNotInArray($themes)
                        ->thenInvalid("The jQuery QueryBuilder theme %s is not supported. Please choose one of " . json_encode($themes))
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
