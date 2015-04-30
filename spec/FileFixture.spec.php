<?php

use holyshared\fixture\FileFixture;
use holyshared\fixture\Container;
use holyshared\fixture\FixtureLoader;
use Prophecy\Prophet;

describe(FileFixture::class, function() {
    describe('#load', function() {
        beforeEach(function() {

            $this->prophet = new Prophet();

            $fixtures = $this->prophet->prophesize(Container::class);
            $fixtures->get('static:loader:default:success')->willReturn('/path/to/file');

            $this->fixtures = $fixtures->reveal();

            $loader = $this->prophet->prophesize(FixtureLoader::class);
            $loader->getName()->willReturn('static');
            $loader->load('/path/to/file', [])->willReturn("static\n");

            $this->loader = $loader->reveal();

            $loaders = $this->prophet->prophesize(Container::class);
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
