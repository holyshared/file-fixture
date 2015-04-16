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
use Mustache_Engine;


final class MustacheLoader implements FixtureLoader
{

    const NAME = 'mustache';

    private $loader;
    private $mustache;

    public function getName()
    {
        return static::NAME;
    }

    public function __construct(FixtureLoader $loader)
    {
        $this->loader = $loader;
        $this->mustache = new Mustache_Engine();
    }

    public function load($path, array $arguments = [])
    {
        $template = $this->loader->load($path, $arguments);
        return $this->mustache->render($template, $arguments);
    }

}
