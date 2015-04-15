<?php

use holyshared\fixture\file\ArrayFlattener;

describe('ArrayFlattener', function() {
    describe('#flatten', function() {
        beforeEach(function() {
            $values = [
                'static' => [
                    'loader' => [
                        'default' => [
                            'ok' => '/path/to/file.php',
                            'ng' => '/path/to/file.php'
                        ]
                    ],
                    'compiler' => [
                        'default' => [
                            'ok' => '/path/to/file.php',
                            'ng' => '/path/to/file.php'
                        ]
                    ]
                ]
            ];
            $this->result = (new ArrayFlattener())->flatten($values);
        });
        it('return flatten array', function() {
            expect($this->result)->toHaveKey('static:loader:default:ok');
            expect($this->result)->toHaveKey('static:loader:default:ng');
            expect($this->result)->toHaveKey('static:compiler:default:ok');
            expect($this->result)->toHaveKey('static:compiler:default:ng');
            expect($this->result)->toHaveLength(4);
        });
    });
});
