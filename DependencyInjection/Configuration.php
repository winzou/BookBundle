<?php

namespace winzou\BookBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration
{
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('winzou_book');
        
        $rootNode
            ->children()
                ->arrayNode('entry')
                    ->children()
                        ->arrayNode('entity')
                            ->children()
                                ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
                                //->scalarNode('class')->defaultValue('winzou\\BookBundle\\Entity\\Entry')->end()
                            ->end()
                        ->end()
                        ->arrayNode('manager')
                            ->children()
                                ->scalarNode('class')->defaultValue('winzou\\BookBundle\\Entity\\Manager\\EntryManager')->end()
                            ->end()
                        ->end()
                     ->end()
                 ->end()
                 ->arrayNode('account')
                    ->children()
                        ->arrayNode('entity')
                            ->children()
                                ->scalarNode('class')->defaultValue('winzou\\BookBundle\\Entity\\Account')->end()
                            ->end()
                        ->end()
                        ->arrayNode('manager')
                            ->children()
                                ->scalarNode('class')->defaultValue('winzou\\BookBundle\\Entity\\Manager\\AccountManager')->end()
                            ->end()
                        ->end()
                     ->end()
                ->end()
            ->end();
            
        return $treeBuilder->buildTree();
    }
}
