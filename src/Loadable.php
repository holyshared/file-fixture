<?php

namespace holyshared\fixture\file;

interface Loadable
{
    public function load($name, array $arguments = []);
}
