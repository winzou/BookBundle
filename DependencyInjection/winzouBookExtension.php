<?php

namespace winzou\BookBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class winzouBookExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor     = new Processor();
        $configuration = new Configuration();

        $config = $processor->process($configuration->getConfigTree(), $configs);
        
        $this->bindParameter($container, 'winzou_book', $config);
            
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
    
    private function bindParameter(ContainerBuilder $container, $name, $value)
    {
        if( is_array($value) )
        {
            foreach( $value as $index => $val )
            {
                $this->bindParameter($container, $name.'.'.$index, $val);
            }
        }
        else
        {
            $container->setParameter($name, $value);
        }
    }
}
