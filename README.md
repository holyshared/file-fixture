file-fixture
==================================

[![Build Status](https://travis-ci.org/holyshared/file-fixture.svg?branch=master)](https://travis-ci.org/holyshared/file-fixture)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/holyshared/file-fixture/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/holyshared/file-fixture/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/552efada10e7149066000804/badge.svg?style=flat)](https://www.versioneye.com/user/projects/552efada10e7149066000804)


Basic usage
----------------------------------

```php
$static = new FileProcessor();
$template = new TemplateProcessor($static);
$art = new ArtProcessor($template);

$processors = new ProcessorContainer([
    $static, $template, $art
]);

$fixtures = new FixtureContainer([
    'static:foo' => __DIR__ . '/path/to/file.txt',
    'art:foo' => __DIR__ . '/path/to/art.txt'
]);

$fixture = new FileFixture($fixtures, $processors);
$fixture->load('static:foo', [ 'name' => 'bar' ]);
```
