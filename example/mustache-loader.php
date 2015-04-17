<?php

require_once __DIR__ . '/../vendor/autoload.php';

use holyshared\fixture\FileFixture;
use holyshared\fixture\loader\TextLoader;
use holyshared\fixture\loader\MustacheLoader;
use holyshared\fixture\container\LoaderContainer;
use holyshared\fixture\container\FixtureContainer;
use holyshared\fixture\factory\FixtureContainerFactory;

$textLoader = new TextLoader();
$loaders = new LoaderContainer([
    $textLoader,
    new MustacheLoader($textLoader)
]);

$factory = new FixtureContainerFactory();
$fixtures = $factory->createFromFile(__DIR__ . '/fixtures.toml');

$fixture = new FileFixture($fixtures, $loaders);
$content = $fixture->load('mustache:default:successMessage', [
    'name' => 'build'
]);

print $content;
