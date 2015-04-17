<?php

require_once __DIR__ . '/../vendor/autoload.php';

use holyshared\fixture\FileFixture;
use holyshared\fixture\loader\TextLoader;
use holyshared\fixture\container\LoaderContainer;
use holyshared\fixture\container\FixtureContainer;
use holyshared\fixture\factory\FixtureContainerFactory;

$loaders = new LoaderContainer([
    new TextLoader()
]);

$fixtures = new FixtureContainer([
    'text:default:readme' => __DIR__ . '/README.md'
]);

$fixture = new FileFixture($fixtures, $loaders);
$content = $fixture->load('text:default:readme');

print $content;
