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

interface Loadable
{
    /**
     * @param string $path
     * @param array $arguments
     */
     public function load($path, array $arguments = []);
}
