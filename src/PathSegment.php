<?php

namespace holyshared\fixture\file;

class PathSegment
{

    /**
     * @var string[]
     */
    private $path = [];

    public function __construct()
    {
        $this->path = [];
    }

    public function moveTo($path)
    {
        $this->path[] = $path;
    }

    public function moveParent()
    {
        array_pop($this->path);
    }

    public function current()
    {
        return implode($this->path, ':');
    }

    public function __toString()
    {
        return $this->current();
    }

}
