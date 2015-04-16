<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture\file\processor;

use holyshared\fixture\file\FixtureProcessor;
use Mustache_Engine;


class TemplateProcessor implements FixtureProcessor
{

    private $processor;
    private $mustache;

    public function getName()
    {
        return 'template';
    }

    public function __construct(FixtureProcessor $processor, array $options = [])
    {
        $this->processor = $processor;
        $this->mustache = new Mustache_Engine($options);
    }

    public function load($path, array $arguments = [])
    {
        $template = $this->processor->load($path);
        return $this->mustache->render($template, $arguments);
    }

}
