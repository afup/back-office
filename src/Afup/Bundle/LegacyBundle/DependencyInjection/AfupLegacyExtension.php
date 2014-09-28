<?php

namespace Afup\Bundle\LegacyBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Loads and manages legacy bundle configuration
 * @package Afup\Bundle\LegacyBundle\DependencyInjection
 * @author  Thierry Marianne <thierry.marianne@weaving-the-web.org>
 */
class AfupLegacyExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
