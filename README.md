file-fixture
==================================

[![Build Status](https://travis-ci.org/holyshared/file-fixture.svg?branch=master)](https://travis-ci.org/holyshared/file-fixture)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/holyshared/file-fixture/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/holyshared/file-fixture/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/552efada10e7149066000804/badge.svg?style=flat)](https://www.versioneye.com/user/projects/552efada10e7149066000804)
[![Stories in Ready](https://badge.waffle.io/holyshared/file-fixture.png?label=ready&title=Ready)](https://waffle.io/holyshared/file-fixture)


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

Using the configuration file, you will be able to easily load the fixture.  
Example of the fixture to load the [mustache](https://github.com/bobthecow/mustache.php) of template.

### Create a fixture template

```mustache
{{name}} task was successful.
```

### Create a configuration file of fixture

The name of the fixture, you must begin with the name of the **loader**.  

```toml
[mustache.default]
successMessage = "template.ms"
```

The name of this fixture will be **mustache:default:successMessage**.

### Load of fixture

Load the fixture by specifying the name.  
When the load is successful, I will return the results of template of mustache has been processed.  

```php
$textLoader = new TextLoader();
$loaders = new LoaderContainer([
    $textLoader,
    new MustacheLoader($textLoader)
]);

$factory = new FixtureContainerFactory();
$fixtures = $factory->createFromFile(__DIR__ . '/fixtures.toml');

$fixture = new FileFixture($fixtures, $loaders);
$content = $fixture->load('mustache:default:successMessage', [
    'name' => 'build'
]);

print $content;
```
