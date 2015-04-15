<?php

use holyshared\fixture\file\filetype\TemplateFile;

describe('TemplateFile', function() {
    describe('#load', function() {
        beforeEach(function() {
            $this->file = new TemplateFile(__DIR__ . '/../fixtures/template.ms');
        });
        it('return loaded content', function() {
            expect($this->file->load([
                'name' => 'foo'
            ]))->toEqual("foo\n");
        });
    });
});
