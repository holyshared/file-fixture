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

use RuntimeException;
use Exception;

class FileNotFoundException extends RuntimeException
{
    /**
     * @param string $path
     * @param int $code
     * @param Exception $previous
     */
    public function __construct($path, $code = 0, Exception $previous = null)
    {
        parent::__construct("File {$path} was not found", $code, $previous);
    }
}
