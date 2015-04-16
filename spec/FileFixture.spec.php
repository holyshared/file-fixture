<?php

use holyshared\fixture\FileFixture;
use Prophecy\Prophet;

describe('FileFixture', function() {
    describe('#load', function() {
        beforeEach(function() {

            $this->prophet = new Prophet();

            $fixtures = $this->prophet->prophesize('holyshared\fixture\Container');
            $fixtures->get('static:loader:default:success')->willReturn('/path/to/file');

            $this->fixtures = $fixtures->reveal();

            $loader = $this->prophet->prophesize('holyshared\fixture\FixtureLoader');
            $loader->getName()->willReturn('static');
            $loader->load('/path/to/file', [])->willReturn("static\n");

            $this->loader = $loader->reveal();

            $loaders = $this->prophet->prophesize('holyshared\fixture\Container');
            $loaders->get('static')->willReturn($this->loader);

            $this->loaders = $loaders->reveal();

            $this->fixture = new FileFixture($this->fixtures, $this->loaders);
        });
        it('return loaded fixture content', function() {
            $content = $this->fixture->load('static:loader:default:success', []);
            expect($content)->toEqual("static\n");
        });
    });
});
