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


class FileFixture implements Loadable
{

    private $loaders;
    private $fixtures;

    public function __construct(Container $fixtures, Container $loaders)
    {
        $this->loaders = $loaders;
        $this->fixtures = $fixtures;
    }

    public function load($name, array $arguments = [])
    {
        $parts = explode(':', $name);
        $loader = array_shift($parts);
        $namespace = implode($parts, ':');

        $path = $this->fixtures->get($name);
        $loader = $this->loaders->get($loader);

        return $loader->load($path, $arguments);
    }

}
