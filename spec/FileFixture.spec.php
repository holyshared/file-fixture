<?php

use holyshared\fixture\file\FileFixture;
use holyshared\fixture\file\ContainerFactory;


describe('FileFixture', function() {
    describe('#load', function() {
        beforeEach(function() {
            $factory = new ContainerFactory();
            $container = $factory->createFromFile(__DIR__ . '/fixtures/config.toml');
            $this->fixture = new FileFixture($container);
        });
        it('return loaded fixture content', function() {
            $content = $this->fixture->load('static:loader:default:success', []);
            expect($content)->toEqual("static\n");
        });
    });
});
