<?php

namespace holyshared\fixture\file;

class FixtureContainerFactory
{

    private $container;
    private $currentSegments;


    public function createFromFile($configFile)
    {
    }

    public function createFromArray(array $configValues = [])
    {
        $this->container = [];
        $this->currentSegments = [];

        $this->walkDictionary($configValues);

        return new FixtureContainer($this->container);
    }

    private function walkDictionary(array $configValues = [])
    {
        foreach ($configValues as $strategy => $value) {
            $this->currentSegments[] = $strategy;

            if (is_array($value)) {
                $this->walkDictionary($value);
            } else {
                $key = implode($this->currentSegments, ':');
                $this->container[$key] = $value;
            }

            array_pop($this->currentSegments);
        }
    }

}
