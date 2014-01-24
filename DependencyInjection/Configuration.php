<?php

namespace Joos\OpenTokBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
            $rootNode = $treeBuilder->root('joos_open_tok');

        $rootNode
        	->children()
        		->scalarNode('class')->defaultValue('OpenTokSDK')->end()
        		->scalarNode('key')->defaultValue(null)->end()
        		->scalarNode('secret')->defaultValue(null)->end()
        	->end()
        ;

        return $treeBuilder;
    }
}