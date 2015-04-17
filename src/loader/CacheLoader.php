<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\loader;

use holyshared\fixture\FixtureLoader;
use Collections\Dictionary;


final class CacheLoader implements FixtureLoader
{

    /**
     * @var \holyshared\fixture\FixtureLoader
     */
    private $loader;

    /**
     * @var \Collections\Dictionary
     */
    private $caches;

    /**
     * @param \holyshared\fixture\FixtureLoader
     */
    public function __construct(FixtureLoader $loader)
    {
        $this->loader = $loader;
        $this->caches = new Dictionary();
    }

    public function getName()
    {
        return 'cache';
    }

    public function load($path, array $arguments = [])
    {
        if ($this->caches->containsKey($path) === false) {
            $content = $this->loader->load($path, $arguments);
            $this->caches->add($path, $content);
        }

        return $this->caches->get($path);
    }

}
