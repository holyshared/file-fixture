<?php

use holyshared\fixture\file\filetype\ArtFile;

describe('ArtFile', function() {
    describe('#load', function() {
        beforeEach(function() {
            $this->file = new ArtFile(__DIR__ . '/../fixtures/art.txt');
        });
        it('return loaded content', function() {
            expect($this->file->load())->toEqual("art\n");
        });
    });
});
