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

interface Container
{
    /**
     * Get the item
     *
     * @param string $name
     * @return mixed
     */
    public function get($name);

    /**
     * Examine whether the item with the specified name exists
     *
     * @param string $name
     * @return bool
     */
     public function has($name);
}
