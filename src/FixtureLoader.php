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

interface FixtureLoader extends Loadable
{
    /**
     * Get the loader name of fixture file
     *
     * @return string loader name
     */
    public function getName();
}
