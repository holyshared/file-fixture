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

interface Loader
{
    /**
     * Load the content of fixture file
     *
     * @param string $path
     * @param array $arguments
     * @return string
     */
    public function load($path, array $arguments = []);
}
