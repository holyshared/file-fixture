<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

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
