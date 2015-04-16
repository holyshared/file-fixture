<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\file\container;

use Collections\Dictionary;
use holyshared\fixture\file\Container;
use holyshared\fixture\file\FixtureProcessor;


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

    public function register(FixtureProcessor $processor)
    {
        $this->processors->add($processor->getName(), $processor);
        return $this;
    }

}
