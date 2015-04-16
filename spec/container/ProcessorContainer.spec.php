<?php

use holyshared\fixture\file\container\ProcessorContainer;
use Prophecy\Prophet;

describe('ProcessorContainer', function() {
    beforeEach(function() {
        $this->prophet = new Prophet();

        $processor = $this->prophet->prophesize('holyshared\fixture\file\FixtureProcessor');
        $processor->getName()->willReturn('foo');
        $this->processor = $processor->reveal();

        $this->container = new ProcessorContainer();
        $this->container->register($this->processor);
    });
    describe('#get', function() {
        it('return content', function() {
            expect($this->container->get('foo'))->toEqual($this->processor);
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
