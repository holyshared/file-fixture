<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\factory;

use Yosymfony\Toml\Toml;
use Eloquent\Pathogen\Factory\PathFactory;
use Eloquent\Pathogen\RelativePath;
use holyshared\fixture\container\FixtureContainer;
use holyshared\fixture\ContainerFactory;
use holyshared\fixture\ArrayFlattener;


class FixtureContainerFactory implements ContainerFactory
{

    private $flattener;

    public function __construct()
    {
        $this->flattener = new ArrayFlattener();
    }

    public function createFromFile($configFile)
    {
        $configPath = PathFactory::instance()->create($configFile);
        $loadConfigFile = $configPath->normalize();

        if (file_exists($loadConfigFile) === false) {
            throw new ConfigFileNotFoundException($loadConfigFile);
        }

        $configDirectory = $configPath->parent();

        $configValues = Toml::parse( $loadConfigFile );
        $result = $this->flattener->flatten($configValues);

        foreach ($result as $key => $fixturePath) {
            $fixtureRelativePath = RelativePath::fromString($fixturePath);
            $fixturePath = $configDirectory->join($fixtureRelativePath);
            $result[$key] = (string) $fixturePath->normalize();
        }

        return new FixtureContainer($result);
    }

    public function createFromArray(array $values = [])
    {
        $result = $this->flattener->flatten($values);
        return new FixtureContainer($result);
    }

}
