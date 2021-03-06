<?php

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Mandango\Tests', __DIR__);
$loader->add('Model', __DIR__);

// mondator
$configClasses = require __DIR__.'/config_classes.php';

use Mandango\Mondator\Mondator;
use Mandango\Id\IdGeneratorContainer;

$mondator = new Mondator();
$mondator->setConfigClasses($configClasses);
$mondator->setExtensions(array(
    new Mandango\Extension\Core(array(
        'metadata_factory_class'  => 'Model\Mapping\Metadata',
        'metadata_factory_output' => __DIR__,
        'default_output'          => __DIR__,
    )),
    new Mandango\Extension\DocumentArrayAccess(),
    new Mandango\Extension\DocumentPropertyOverloading(),
));
IdGeneratorContainer::add('ab-id', 'Mandango\Tests\Id\ABIdGenerator');
$mondator->process();
