<?php

use holyshared\fixture\loader\CacheLoader;
use Prophecy\Prophet;


describe('CacheLoader', function() {
    describe('#getName', function() {
        beforeEach(function() {
            $this->prophet = new Prophet();

            $loader = $this->prophet->prophesize('holyshared\fixture\FixtureLoader');
            $loader->getName()->willReturn('text');

            $this->loader = new CacheLoader($loader->reveal());
        });
        it('return base loader name', function() {
            expect($this->loader->getName())->toEqual('text');
        });
    });
    describe('#load', function() {
        beforeEach(function() {
            $this->template = __DIR__ . '/../fixtures/static.txt';
            $this->prophet = new Prophet();

            $loader = $this->prophet->prophesize('holyshared\fixture\FixtureLoader');
            $loader->load($this->template, [])
                ->willReturn("static\n")
                ->shouldBeCalledTimes(1);

            $this->loader = new CacheLoader($loader->reveal());
        });
        it('return cached content', function() {
            $content = $this->loader->load($this->template);
            expect($content)->toEqual("static\n");

            $content = $this->loader->load($this->template);
            expect($content)->toEqual("static\n");

            $this->prophet->checkPredictions();
        });
    });
});
