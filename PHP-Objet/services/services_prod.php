<?php


use Cfd\Log\Logger;
use Cfd\Writer\NullWriter;
use Symfony\Component\DependencyInjection\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$definitionWriter = $containerBuilder->register('writer', NullWriter::class);

$definitionLogger = $containerBuilder->register('logger', Logger::class);
$definitionLogger->addArgument($containerBuilder->get('writer'));

return $containerBuilder;