<?php

use holyshared\fixture\container\FixtureContainer;
use holyshared\fixture\factory\FixtureContainerFactory;


describe('FixtureContainerFactory', function() {
    describe('#createFromFile', function() {
        beforeEach(function() {
            $this->factory = new FixtureContainerFactory();
        });
        context('when file exists', function() {
            beforeEach(function() {
                $this->container = $this->factory->createFromFile(__DIR__ . '/../fixtures/config.toml');
            });
            it('return FixtureContainer', function() {
                expect($this->container)->toBeAnInstanceOf('holyshared\fixture\container\FixtureContainer');
                expect($this->container->get('static:loader:default:success'))->toEndWith('static.txt');
                expect($this->container->get('static:loader:default:failure'))->toEndWith('static.txt');
            });
        });
        context('when file not exists', function() {
            it('throw ConfigFileNotFoundException', function() {
                expect(function() {
                    $this->factory->createFromFile(__DIR__ . '/not_found_config.toml');
                })->toThrow('holyshared\fixture\factory\ConfigFileNotFoundException');
            });
        });
    });
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
            expect($this->container)->toBeAnInstanceOf('holyshared\fixture\container\FixtureContainer');
            expect($this->container->get('static:loader:default:ok'))->toEqual('/path/to/file.php');
            expect($this->container->get('static:loader:default:ng'))->toEqual('/path/to/file.php');
        });
    });
});
