<?php

use holyshared\fixture\file\FixtureContainer;
use holyshared\fixture\file\FixtureContainerFactory;

describe('FixtureContainerFactory', function() {
    describe('#createFromArray', function() {
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
            $factory = new FixtureContainerFactory();
            $this->container = $factory->createFromArray($values);
        });
        it('return FixtureContainer', function() {
            expect($this->container)->toBeAnInstanceOf('holyshared\fixture\file\FixtureContainer');
            expect($this->container->get('static:loader:default:ok'))->toEqual('/path/to/file.php');
            expect($this->container->get('static:loader:default:ng'))->toEqual('/path/to/file.php');
        });
    });
});