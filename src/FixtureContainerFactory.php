<?php

namespace holyshared\fixture\file;

use Yosymfony\Toml\Toml;
use Eloquent\Pathogen\Factory\PathFactory;
use Eloquent\Pathogen\RelativePath;


class FixtureContainerFactory
{

    private $flattener;

    public function __construct()
    {
        $this->flattener = new ArrayFlattener();
    }

    public function createFromFile($configFile)
    {
        $configFilePath = PathFactory::instance()->create($configFile);
        $configFileDirectory = $configFilePath->parent();

        $configValues = Toml::parse( $configFilePath->normalize() );
        $result = $this->flattener->flatten($configValues);

        foreach ($result as $key => $fixturePath) {
            $fixtureRelativePath = RelativePath::fromString($fixturePath);
            $fixturePath = $configFileDirectory->join($fixtureRelativePath);
            $result[$key] = (string) $fixturePath->normalize();
        }

        return new FixtureContainer($result);
    }

    public function createFromArray(array $configValues = [])
    {
        $result = $this->flattener->flatten($configValues);
        return new FixtureContainer($result);
    }

}
