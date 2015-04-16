<?php

use holyshared\fixture\container\FixtureContainer;

describe('FixtureContainer', function() {
    beforeEach(function() {
        $this->container = new FixtureContainer([
            'foo' => 'bar'
        ]);
    });
    describe('#get', function() {
        it('return content', function() {
            expect($this->container->get('foo'))->toEqual('bar');
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
