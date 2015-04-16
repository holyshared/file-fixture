<?php

use holyshared\fixture\loader\TextLoader;


describe('TextLoader', function() {
    describe('#getName', function() {
        it('return loader name', function() {
            expect((new TextLoader())->getName())->toEqual("text");
        });
    });
    describe('#load', function() {
        beforeEach(function() {
            $this->loader = new TextLoader();
            $this->template = __DIR__ . '/../fixtures/static.txt';
        });
        context('when file exists', function() {
            it('return loaded content', function() {
                $content = $this->loader->load($this->template);
                expect($content)->toEqual("static\n");
            });
        });
        context('when file not exists', function() {
            it('throw FixtureFileNotFoundException exception', function() {
                expect(function() {
                    $this->loader->load('not_found.txt');
                })->toThrow('holyshared\fixture\loader\FixtureFileNotFoundException');
            });
        });
    });
});
