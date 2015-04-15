<?php

namespace holyshared\fixture\file;


class ArrayFlattener
{

    private $segment;
    private $currentPath;


    public function __construct($segment = ':')
    {
        $this->segment = $segment;
        $this->currentPath = new PathSegment;
    }

    public function flatten(array $values = [])
    {
        return $this->walkKeyIndexArray($values);
    }

    private function walkKeyIndexArray(array $configValues = [])
    {
        $result = [];

        foreach ($configValues as $path => $value) {
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
