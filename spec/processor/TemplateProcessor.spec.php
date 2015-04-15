<?php

use holyshared\fixture\file\processor\FileProcessor;
use holyshared\fixture\file\processor\TemplateProcessor;

describe('TemplateProcessor', function() {
    describe('#load', function() {
        beforeEach(function() {
            $processor = new FileProcessor();
            $this->processor = new TemplateProcessor($processor);
            $this->template = __DIR__ . '/../fixtures/template.ms';
        });
        it('return loaded content', function() {
            $values = [
                'name' => 'foo'
            ];
            $content = $this->processor->load($this->template, $values);
            expect($content)->toEqual("foo\n");
        });
    });
});
