<?php

namespace Adamski\Symfony\MailerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root("mailer");

        $rootNode
            ->children()
                ->arrayNode("default_sender")
                    ->children()
                        ->scalarNode("sender_address")->defaultValue("noreply@example.com")->end()
                        ->scalarNode("sender_name")->defaultValue("noreply")->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
