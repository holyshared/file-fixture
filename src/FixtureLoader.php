<?php

namespace holyshared\fixture\file;

/**
 * [art]
 * aaa=/path/to
 *
 * [template]
 * aaa=/path/to
 *
 * [static]
 * aaa=/path/to
 */







class FixtureLoader implements FixtureLoadable
{
  private $strategies;

  public function __construct(array $strategies = [])
  {
    $this->strategies = StrategyRegistry::fromArray($strategies);
  }

  /**
   * $loader = new FixtureLoader();
   * $fixture = $loader->load('art.loader.success', [ 'name' => 'foo' ]);
   */
  public function load($name, array $arguments = [])
  {
    list($storategy, $namespace) = explode($name, ':');
    $storategy = $this->strategies->get($storategy);
    return $storategy->load($name, $arguments);
  }
}
