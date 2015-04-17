<?php

require_once __DIR__ . '/../vendor/autoload.php';

use holyshared\fixture\FileFixture;
use holyshared\fixture\loader\TextLoader;
use holyshared\fixture\loader\MustacheLoader;
use holyshared\fixture\loader\ArtLoader;
use holyshared\fixture\container\LoaderContainer;
use holyshared\fixture\container\FixtureContainer;
use holyshared\fixture\factory\FixtureContainerFactory;

$loaders = new LoaderContainer([
    new ArtLoader(new MustacheLoader(new TextLoader()))
]);

$fixtures = new FixtureContainer([
    'art:default:header' => __DIR__ . '/art.txt'
]);

$fixture = new FileFixture($fixtures, $loaders);
$content = $fixture->load('art:default:header');

print $content;
