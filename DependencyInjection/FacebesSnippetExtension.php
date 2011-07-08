<?php

namespace Facebes\SnippetBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class FacebesSnippetExtension extends Extension
{ 
  public function load(array $configs,  ContainerBuilder $container)
  {
	$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
	$loader->load('twig_core_extension.yml');
  }

    public function getAlias()
    {
        return 'facebes_snippet';
    }
}
