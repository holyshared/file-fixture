<?php

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\fixture;

final class PathRecorder
{

    /**
     * @var string[]
     */
    private $path = [];

    /**
     * @var string
     */
    private $pathSegment;

    /**
     * @param string $pathSegment
     */
    public function __construct($pathSegment = ':')
    {
        $this->path = [];
        $this->pathSegment = $pathSegment;
    }

    /**
     * Move to the path of the specified name
     *
     * @param string $path
     */
    public function moveTo($path)
    {
        $this->path[] = $path;
    }

    /**
     * Move to the path of parent
     */
    public function moveParent()
    {
        array_pop($this->path);
    }

    /**
     * Get the path of current
     *
     * @return string
     */
    public function current()
    {
        return implode($this->path, $this->pathSegment);
    }

    public function __toString()
    {
        return $this->current();
    }

}
