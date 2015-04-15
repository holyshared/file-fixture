<?php

namespace holyshared\fixture\file;

use Yosymfony\Toml\Toml;

class FixtureContainerFactory
{

    public function createFromFile($configFile)
    {
        $configValues = Toml::parse($configFile);
        return $this->createFromArray($configValues);
    }

    public function createFromArray(array $configValues = [])
    {
        $flattener = new ArrayFlattener();
        $flattenArray = $flattener->flatten($configValues);

        return new FixtureContainer($flattenArray);
    }

}
