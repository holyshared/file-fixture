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


final class FixtureContainer implements Container
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

    /**
     * Get the path of fixture file
     *
     * @param string $name
     * @return string
     */
    public function get($name)
    {
        return $this->fixtures->get($name);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return $this->fixtures->containsKey($name);
    }

}
