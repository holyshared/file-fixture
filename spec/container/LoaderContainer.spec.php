<?php

use holyshared\fixture\container\LoaderContainer;
use holyshared\fixture\FixtureLoader;
use Prophecy\Prophet;

describe(LoaderContainer::class, function() {
    beforeEach(function() {
        $this->prophet = new Prophet();

        $loader = $this->prophet->prophesize(FixtureLoader::class);
        $loader->getName()->willReturn('foo');
        $this->loader = $loader->reveal();

        $this->container = new LoaderContainer([ $this->loader ]);
    });
    describe('#get', function() {
        it('return content', function() {
            expect($this->container->get('foo'))->toEqual($this->loader);
        });
    });
    describe('#has', function() {
        context('when key not exists', function() {
            it('return false', function() {
                expect($this->container->has('bar'))->toBeFalse();
            });
        });
        context('when key exists', function() {
            it('return true', function() {
                expect($this->container->has('foo'))->toBeTrue();
            });
        });
    });
});
