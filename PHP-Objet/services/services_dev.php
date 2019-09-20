<?php


use Cfd\Log\Logger;
use Cfd\Writer\FileWriter;
use Symfony\Component\DependencyInjection\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$definitionWriter = $containerBuilder->register('writer', FileWriter::class);
$definitionWriter->addArgument(__DIR__ . '/../logs/app.log');

$definitionLogger = $containerBuilder->register('logger', Logger::class);
$definitionLogger->addArgument($containerBuilder->get('writer'));

return $containerBuilder;