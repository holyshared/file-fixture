<?php

namespace holyshared\fixture\file;

interface FixtureProcessor
{

    public function load($path, array $arguments = []);

}
