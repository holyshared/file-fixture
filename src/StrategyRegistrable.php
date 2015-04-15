<?php

namespace holyshared\fixture\file;

interface StrategyRegistrable
{
    public function register($name, Strategy $strategy);
}
