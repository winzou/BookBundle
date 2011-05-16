<?php

/*
 * This file is part of winzouBookBundle.
 *
 * winzouBookBundle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * winzouBookBundle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
                                ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
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
