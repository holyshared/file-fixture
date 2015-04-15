<?php

namespace holyshared\fixture\file;


abstract class FixtureFile implements FileLoadable
{

    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

}
