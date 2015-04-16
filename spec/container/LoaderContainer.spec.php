<?php

use holyshared\fixture\container\LoaderContainer;
use Prophecy\Prophet;

describe('LoaderContainer', function() {
    beforeEach(function() {
        $this->prophet = new Prophet();

        $loader = $this->prophet->prophesize('holyshared\fixture\FixtureLoader');
        $loader->getName()->willReturn('foo');
        $this->loader = $loader->reveal();

        $this->container = new LoaderContainer();
        $this->container->register($this->loader);
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
