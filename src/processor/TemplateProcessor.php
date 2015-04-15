<?php

namespace holyshared\fixture\file\processor;

use holyshared\fixture\file\FixtureProcessor;
use Mustache_Engine;


class TemplateProcessor implements FixtureProcessor
{

    private $processor;
    private $mustache;

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
