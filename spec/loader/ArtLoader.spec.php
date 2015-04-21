<?php

use holyshared\fixture\loader\TextLoader;
use holyshared\fixture\loader\ArtLoader;
use holyshared\fixture\loader\MustacheLoader;
use Prophecy\Prophet;


describe('ArtLoader', function() {
    describe('#load', function() {
        beforeEach(function() {
            $this->values = [ 'name' => 'foo' ];
            $this->template = __DIR__ . '/../fixtures/art.txt';

            $this->prophet = new Prophet();

            $loader = $this->prophet->prophesize('holyshared\fixture\Loader');
            $loader->load($this->template, $this->values)->willReturn("<green>foo</green>\n");

            $this->loader = new ArtLoader($loader->reveal());
        });
        it('return loaded content', function() {
            $template = $this->template;
            expect(function () use($template) {
                $values = [ 'name' => 'foo' ];
                echo $this->loader->load($template, $values);
            })->toPrint("[m[32mfoo[0m\n[0m");
        });
    });
});
