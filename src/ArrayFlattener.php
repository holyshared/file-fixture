<?php

namespace holyshared\fixture;

/**
 * This file is part of file-fixture.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

class ArrayFlattener
{

    private $currentPath;

    public function __construct($segment = ':')
    {
        $this->currentPath = new PathRecorder($segment);
    }

    public function flatten(array $values = [])
    {
        return $this->walkKeyIndexArray($values);
    }

    private function walkKeyIndexArray(array $values = [])
    {
        $result = [];

        foreach ($values as $path => $value) {
            $this->currentPath->moveTo($path);

            if (is_array($value)) {
                $childResult = $this->walkKeyIndexArray($value);
                $result = array_merge($result, $childResult);
            } else {
                $key = (string) $this->currentPath;
                $result[$key] = $value;
            }

            $this->currentPath->moveParent();
        }

        return $result;
    }

}
