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


final class TextLoader implements FixtureLoader
{

    const NAME = 'text';

    public function getName()
    {
        return static::NAME;
    }

    public function load($path, array $arguments = [])
    {
        if (file_exists($path) === false) {
            throw new FixtureFileNotFoundException("File {$path} was not found");
        }

        return file_get_contents($path);
    }

}
