<?php

namespace holyshared\fixture\file\filetype;

use holyshared\fixture\file\FixtureFile;
use holyshared\fixture\file\FileLoadable;

final class StaticFile extends FixtureFile implements FileLoadable
{
    public function load(array $arguments = [])
    {
        $path = $this->getPath();
        return file_get_contents($this->getPath());
    }
}
