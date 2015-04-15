<?php

use holyshared\fixture\file\filetype\StaticFile;

describe('StaticFile', function() {
    describe('#load', function() {
        beforeEach(function() {
            $this->file = new StaticFile(__DIR__ . '/../fixtures/static.txt');
        });
        it('return loaded content', function() {
            expect($this->file->load())->toEqual("static\n");
        });
    });
});
