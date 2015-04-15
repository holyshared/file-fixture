<?php

namespace holyshared\fixture\file;

interface FixtureLoadable
{
    public function load($name, array $arguments = []);
}
