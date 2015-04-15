<?php

namespace holyshared\fixture\file;

interface Container
{
    public function get($name);
    public function has($name);
}
