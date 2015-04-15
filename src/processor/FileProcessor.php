<?php

namespace holyshared\fixture\file\processor;

use holyshared\fixture\file\FixtureProcessor;


class FileProcessor implements FixtureProcessor
{

    public function load($path, array $arguments = [])
    {
        return file_get_contents($path);
    }

}
