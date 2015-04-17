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


final class LoaderContainer implements Container
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

    /**
     * Get the loader of fixture
     *
     * @param string $name
     * @return \holyshared\fixture\FixtureLoader
     */
    public function get($name)
    {
        return $this->loaders->get($name);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return $this->loaders->containsKey($name);
    }

    /**
     * Register the loader of fixture
     *
     * @param \holyshared\fixture\FixtureLoader $loader
     * @return holyshared\fixture\container\LoaderContainer
     */
    public function register(FixtureLoader $loader)
    {
        $this->loaders->add($loader->getName(), $loader);
        return $this;
    }

    /**
     * Register all the loader of fixture
     *
     * @param \holyshared\fixture\FixtureLoader[] $loaders
     * @return holyshared\fixture\container\LoaderContainer
     */
    public function registerAll(array $loaders = [])
    {
        foreach ($loaders as $loader) {
            $this->register($loader);
        }
        return $this;
    }

}
