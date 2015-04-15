<?php

use holyshared\fixture\file\processor\FileProcessor;
use holyshared\fixture\file\processor\ArtProcessor;
use holyshared\fixture\file\processor\TemplateProcessor;


describe('ArtProcessor', function() {
    describe('#load', function() {
        beforeEach(function() {
            $processor = new FileProcessor();
            $processor = new TemplateProcessor($processor);
            $this->processor = new ArtProcessor($processor);
            $this->template = __DIR__ . '/../fixtures/art.txt';
        });
        it('return loaded content', function() {
            $template = $this->template;
            expect(function () use($template) {
                $values = [ 'name' => 'foo' ];
                echo $this->processor->load($template, $values);
            })->toPrint("[m[32mfoo[0m\n[0m");
        });
    });
});
