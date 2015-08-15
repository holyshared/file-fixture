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

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return static::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function load($path, array $arguments = [])
    {
        if (file_exists($path) === false) {
            throw new FixtureFileNotFoundException($path);
        }
        $content = file_get_contents($path);

        return rtrim($content);
    }

}
