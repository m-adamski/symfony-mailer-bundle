<?php

namespace Adamski\Symfony\MailerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder("mailer");

        if (method_exists($treeBuilder, "getRootNode")) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root("mailer");
        }

        $rootNode
            ->children()
            ->scalarNode("sender_address")->defaultValue("noreply@example.com")->end()
            ->scalarNode("sender_name")->defaultValue("no-reply")->end()
            ->end();

        return $treeBuilder;
    }
}
