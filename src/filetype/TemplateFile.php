<?php

namespace holyshared\fixture\file\filetype;

use holyshared\fixture\file\FileLoadable;
use holyshared\fixture\file\FixtureFile;
use Mustache_Engine;


final class TemplateFile extends FixtureFile implements FileLoadable
{

    private $mustache;

    public function __construct($path)
    {
        $this->mustache = new Mustache_Engine;
        parent::__construct($path);
    }

    public function load(array $arguments = [])
    {
        $path = $this->getPath();
        $template = file_get_contents($this->getPath());

        return $this->mustache->render($template, $arguments);
    }

}
