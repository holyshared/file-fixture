<?php

use holyshared\fixture\loader\TextLoader;
use holyshared\fixture\Loader;
use holyshared\fixture\loader\MustacheLoader;
use Prophecy\Prophet;

describe(MustacheLoader::class, function() {
    describe('#load', function() {
        beforeEach(function() {
            $this->template = __DIR__ . '/../fixtures/template.ms';
            $this->values = [
                'name' => 'foo'
            ];
            $this->prophet = new Prophet();
            $loader = $this->prophet->prophesize(Loader::class);
            $loader->load($this->template, $this->values)->willReturn('{{name}}');

            $this->loader = new MustacheLoader($loader->reveal());
        });
        it('return loaded content', function() {
            $content = $this->loader->load($this->template, $this->values);
            expect($content)->toEqual("foo");
        });
    });
});
