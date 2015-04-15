<?php

namespace holyshared\fixture\file;

use Collections\Dictionary;

class FixtureContainer implements Container
{

    /**
     * @var \Collections\Dictionary
     */
    private $fixtures;

    /**
     * @param array $fixtures
     */
    public function __construct(array $fixtures = [])
    {
        $this->fixtures = Dictionary::fromArray($fixtures);
    }

    public function get($name)
    {
        return $this->fixtures->get($name);
    }

    public function has($name)
    {
        return $this->fixtures->containsKey($name);
    }

}
