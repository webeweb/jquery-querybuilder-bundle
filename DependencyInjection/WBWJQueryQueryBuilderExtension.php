<?php

/*
 * This file is part of the jquery-querybuilder-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;

/**
 * jQuery QueryBuilder extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\QueryBuilderBundle\DependencyInjection
 */
class WBWJQueryQueryBuilderExtension extends Extension {

    /**
     * Extension alias.
     *
     * @var string
     */
    const EXTENSION_ALIAS = "wbw_jquery_querybuilder";

    /**
     * {@inheritDoc}
     */
    public function getAlias(): string {
        return self::EXTENSION_ALIAS;
    }

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container): void {

        $fileLocator = new FileLocator(__DIR__ . "/../Resources/config");

        $serviceLoader = new YamlFileLoader($container, $fileLocator);
        $serviceLoader->load("services.yml");

        /** @var ConfigurationInterface $configuration */
        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "locale");
        ConfigurationHelper::registerContainerParameter($container, $config, $this->getAlias(), "theme");

        $assets = ConfigurationHelper::loadYamlConfig(__DIR__, "assets");
        ConfigurationHelper::registerContainerParameters($container, $assets["assets"]);
    }
}
