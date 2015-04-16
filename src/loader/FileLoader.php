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


class FileLoader implements FixtureLoader
{

    public function getName()
    {
        return 'static';
    }

    public function load($path, array $arguments = [])
    {
        return file_get_contents($path);
    }

}
