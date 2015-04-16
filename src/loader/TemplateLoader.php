<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\file\loader;

use holyshared\fixture\file\FixtureLoader;
use Mustache_Engine;


class TemplateLoader implements FixtureLoader
{

    private $loader;
    private $mustache;

    public function getName()
    {
        return 'template';
    }

    public function __construct(FixtureProcessor $loader)
    {
        $this->loader = $loader;
        $this->mustache = new Mustache_Engine();
    }

    public function load($path, array $arguments = [])
    {
        $template = $this->loader->load($path);
        return $this->mustache->render($template, $arguments);
    }

}
