<?php

namespace holyshared\fixture\file;

class FixtureLoader implements FixtureLoadable
{

    private $container;
//    private $strategies;


    public function __construct(FixtureContainer $container)
    {
        $this->container = $container;
    //    $this->strategies = StrategyRegistry::fromArray($strategies);
    }

    /**
     * $loader = new FixtureLoader();
     * $fixture = $loader->load('art.loader.success', [ 'name' => 'foo' ]);
     */
    public function load($name, array $arguments = [])
    {
        $fixture = $this->container->get($name);
        return $fixture->load($arguments);


//        list($storategy, $namespace) = explode($name, ':');
//        $storategy = $this->strategies->get($storategy);
//        return $storategy->load($name, $arguments);
    }

}
