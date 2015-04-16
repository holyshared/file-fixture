[![Stories in Ready](https://badge.waffle.io/holyshared/file-fixture.png?label=ready&title=Ready)](https://waffle.io/holyshared/file-fixture)
file-fixture
==================================

[![Build Status](https://travis-ci.org/holyshared/file-fixture.svg?branch=master)](https://travis-ci.org/holyshared/file-fixture)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/holyshared/file-fixture/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/holyshared/file-fixture/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/552efada10e7149066000804/badge.svg?style=flat)](https://www.versioneye.com/user/projects/552efada10e7149066000804)


Basic usage
----------------------------------

```php
$static = new FileLoader();
$template = new TemplateLoader($static);
$art = new ArtLoader($template);

$loaders = new LoaderContainer([
    $static, $template, $art
]);

$fixtures = new FixtureContainer([
    'static:foo' => __DIR__ . '/path/to/file.txt',
    'art:foo' => __DIR__ . '/path/to/art.txt'
]);

$fixture = new FileFixture($fixtures, $loaders);
$fixture->load('static:foo', [ 'name' => 'bar' ]);
```

Configuration file
----------------------------------

```toml
# File fixtures

[static.loader.default]
success = "foo.txt"
failure = "bar.txt"
```


```php
$static = new FileLoader();
$template = new TemplateLoader($static);
$art = new ArtLoader($template);

$loaders = new LoaderContainer([ $static, $template, $art ]);

$factory = new FixtureContainerFactory();
$fixtures = $factory->createFromFile('fixtures.toml');

$fixture = new FileFixture($fixtures, $loaders);
$fixture->load('static:loader:default:success');
```
