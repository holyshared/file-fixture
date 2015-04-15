<?php

namespace holyshared\fixture\file;

class FixtureContainerFactory
{

    public function createFromFile($configFile)
    {
    }

    public function createFromArray(array $configValues = [])
    {
        $flattener = new ArrayFlattener();
        $flattenArray = $flattener->flatten($configValues);

        return new FixtureContainer($flattenArray);
    }

}
