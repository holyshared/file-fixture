<?php

use holyshared\fixture\loader\TextLoader;
use holyshared\fixture\loader\MustacheLoader;
use Prophecy\Prophet;

describe('MustacheLoader', function() {
    describe('#load', function() {
        beforeEach(function() {
            $this->template = __DIR__ . '/../fixtures/template.ms';

            $loader = $this->prophet->prophesize('holyshared\fixture\FixtureLoader');
            $loader->load($this->template)->willReturn('{{name}}');

            $this->loader = new MustacheLoader($loader->reveal());
        });
        it('return loaded content', function() {
            $values = [
                'name' => 'foo'
            ];
            $content = $this->loader->load($this->template, $values);
            expect($content)->toEqual("foo");
        });
    });
});
