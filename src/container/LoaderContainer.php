<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\container;

use Collections\Dictionary;
use holyshared\fixture\Container;
use holyshared\fixture\FixtureLoader;


class LoaderContainer implements Container
{

    /**
     * @var \Collections\Dictionary
     */
    private $loaders;

    /**
     * @param FixtureLoader[] $loaders
     */
    public function __construct(array $loaders = [])
    {
        $this->loaders = new Dictionary();
        $this->registerAll($loaders);
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

    public function registerAll(array $loaders = [])
    {
        foreach ($loaders as $loader) {
            $this->register($loader);
        }
        return $this;
    }

}
