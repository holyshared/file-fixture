<?php

use holyshared\fixture\loader\TextLoader;
use holyshared\fixture\loader\TemplateLoader;

describe('TemplateLoader', function() {
    describe('#load', function() {
        beforeEach(function() {
            $loader = new TextLoader();
            $this->loader = new TemplateLoader($loader);
            $this->template = __DIR__ . '/../fixtures/template.ms';
        });
        it('return loaded content', function() {
            $values = [
                'name' => 'foo'
            ];
            $content = $this->loader->load($this->template, $values);
            expect($content)->toEqual("foo\n");
        });
    });
});
