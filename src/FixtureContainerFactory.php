<?php

namespace holyshared\fixture\file;

use Yosymfony\Toml\Toml;

class FixtureContainerFactory
{

    private $flattener;


    public function __construct()
    {
        $this->flattener = new ArrayFlattener();
    }

    public function createFromFile($configFile)
    {
        $absolutePath = realpath($configFile);
        $configDirectory = dirname($absolutePath);

        $configValues = Toml::parse($configFile);
        $result = $this->flattener->flatten($configValues);

        foreach ($result as $key => $relativePath) {
            $result[$key] = $configDirectory . '/' . $relativePath;
        }

        return new FixtureContainer($result);
    }

    public function createFromArray(array $configValues = [])
    {
        $result = $this->flattener->flatten($configValues);
        return new FixtureContainer($result);
    }

}
