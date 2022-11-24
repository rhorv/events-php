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
     * @var \Events\Publisher\PublisherInterface
     */
    $publisher = $container->get("rabbit_publisher");

    $publisher->publish(new \Events\Message("68c5a2ff-9f10-4336-95f8-d97caba61218", "test_happened", ["field1" => "value1", "field2" => "value2"], new DateTime("c")));




