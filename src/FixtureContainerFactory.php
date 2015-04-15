<?php

namespace holyshared\fixture\file;

class FixtureContainerFactory
{

    private $container;
    private $currentPath;


    public function __construct()
    {
        $this->container = [];
        $this->currentPath = new PathSegment;
    }

    public function createFromFile($configFile)
    {
    }

    public function createFromArray(array $configValues = [])
    {
        $this->walkDictionary($configValues);

        return new FixtureContainer($this->container);
    }

    private function walkDictionary(array $configValues = [])
    {
        foreach ($configValues as $strategy => $value) {
            $this->currentPath->moveTo($strategy);

            if (is_array($value)) {
                $this->walkDictionary($value);
            } else {
                $key = (string) $this->currentPath;
                $this->container[$key] = $value;
            }

            $this->currentPath->moveParent();
        }
    }

}
