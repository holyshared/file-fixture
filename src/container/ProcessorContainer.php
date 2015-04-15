<?php

namespace holyshared\fixture\file\container;

use Collections\Dictionary;
use holyshared\fixture\file\Container;


class ProcessorContainer implements Container
{

    /**
    * @var \Collections\Dictionary
    */
    private $processors;

    /**
    * @param array $fixtures
    */
    public function __construct(array $processors = [])
    {
        $this->processors = Dictionary::fromArray($processors);
    }

    public function get($name)
    {
        return $this->processors->get($name);
    }

    public function has($name)
    {
        return $this->processors->containsKey($name);
    }

}
