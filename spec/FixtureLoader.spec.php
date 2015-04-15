<?php

use holyshared\fixture\file\FixtureLoader;
use holyshared\fixture\file\ContainerFactory;


describe('FixtureLoader', function() {
    describe('#load', function() {
        beforeEach(function() {
            $factory = new ContainerFactory();
            $container = $factory->createFromFile(__DIR__ . '/fixtures/config.toml');
            $this->loader = new FixtureLoader($container);
        });
        it('return loaded fixture content', function() {
            $content = $this->loader->load('static:loader:default:success', []);
            expect($content)->toEqual("static\n");
        });
    });
});
