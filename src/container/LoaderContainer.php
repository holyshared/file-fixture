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
use holyshared\fixture\file\FixtureLoader;


class LoaderContainer implements Container
{

    /**
     * @var \Collections\Dictionary
     */
    private $loaders;

    /**
     * @param array $fixtures
     */
    public function __construct(array $processors = [])
    {
        $this->loaders = Dictionary::fromArray($processors);
    }

    public function get($name)
    {
        return $this->loaders->get($name);
    }

    public function has($name)
    {
        return $this->loaders->containsKey($name);
    }

    public function register(FixtureLoader $loader)
    {
        $this->loaders->add($loader->getName(), $loader);
        return $this;
    }

}
