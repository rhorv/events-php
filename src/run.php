<?php

    require_once(__DIR__.'/../vendor/autoload.php');
    use Symfony\Component\DependencyInjection\ContainerBuilder;

    $container = new ContainerBuilder();
    $loader = new \Symfony\Component\DependencyInjection\Loader\YamlFileLoader(
        $container,
        new \Symfony\Component\Config\FileLocator(__DIR__."/application/Config")
    );
    $loader->load('container.yml');

    /**
     * @var \Events\Consumer\ConsumerInterface
     */
    $consumer = $container->get("rabbit_consumer");

    $consumer->consume();



