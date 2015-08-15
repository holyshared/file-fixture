<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture;

use holyshared\fixture\Container;
use Yosymfony\Toml\Toml;


class FileFixture implements Loader
{

    /**
     * @var \holyshared\fixture\Container
     */
    private $loaders;

    /**
     * @var \holyshared\fixture\Container
     */
    private $fixtures;

    /**
     * Create a new FileFixture
     *
     * @param \holyshared\fixture\Container $fixtures
     * @param \holyshared\fixture\Container $loaders
     */
    public function __construct(Container $fixtures, Container $loaders)
    {
        $this->loaders = $loaders;
        $this->fixtures = $fixtures;
    }

    /**
     * {@inheritdoc}
     */
    public function load($name, array $arguments = [])
    {
        $parts = explode(':', $name);
        $loader = array_shift($parts);

        $path = $this->resolveName($name);
        $loader = $this->loaders->get($loader);

        return $loader->load($path, $arguments);
    }

    /**
     * Get the Path from the name of the fixture
     *
     * <code>
     * $path = $fixture->resolveName('text:ok'); //Return absolute path of fixture
     * </code>
     *
     * @param string $name name of fixture
     * @return string path of fixture
     */
    public function resolveName($name)
    {
        $path = $this->fixtures->get($name);

        return $path;
    }

}
