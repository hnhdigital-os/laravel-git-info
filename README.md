# GIT Info

This package has been developed by H&H|Digital, an Australian botique developer. Visit us at [hnh.digital](http://hnh.digital).

[![Latest Stable Version](https://poser.pugx.org/bluora/laravel-git-info/v/stable.svg)](https://packagist.org/packages/bluora/laravel-git-info) [![Total Downloads](https://poser.pugx.org/bluora/laravel-git-info/downloads.svg)](https://packagist.org/packages/bluora/laravel-git-info) [![Latest Unstable Version](https://poser.pugx.org/bluora/laravel-git-info/v/unstable.svg)](https://packagist.org/packages/bluora/laravel-git-info) [![License](https://poser.pugx.org/bluora/laravel-git-info/license.svg)](https://packagist.org/packages/bluora/laravel-git-info)

[![Build Status](https://travis-ci.org/bluora/laravel-git-info.svg?branch=master)](https://travis-ci.org/bluora/laravel-git-info) [![StyleCI](https://styleci.io/repos/65619816/shield?branch=master)](https://styleci.io/repos/65619816) [![Test Coverage](https://codeclimate.com/github/bluora/laravel-git-info/badges/coverage.svg)](https://codeclimate.com/github/bluora/laravel-git-info/coverage) [![Issue Count](https://codeclimate.com/github/bluora/laravel-git-info/badges/issue_count.svg)](https://codeclimate.com/github/bluora/laravel-git-info) [![Code Climate](https://codeclimate.com/github/bluora/laravel-git-info/badges/gpa.svg)](https://codeclimate.com/github/bluora/laravel-git-info) 

Provides a wrapper for getting info from GIT.

## Install

Via composer:

`$ composer require bluora/laravel-git-info dev-master`

### Laravel configuration

Enable the service provider by editing config/app.php:

```php
    'providers' => [
        ...
        Bluora\LaravelGitInfo\ServiceProvider::class,
        ...
    ];
```

Enable the facade by editing config/app.php:

```php
    'aliases' => [
        ...
        'GitInfo' => Bluora\LaravelGitInfo\Facade::class,
        ...
    ];
```

## Usage

### Laravel

Current version. Eg 'de83088-dirty'.

```php
echo GitInfo::version();
```

Current branch. Eg 'master'.

```php
echo GitInfo::branch();
```

Current total commits. Eg 7.

```php
echo GitInfo::commits();
```

Commit difference between current branch and master.

Optional arguments include specifying a branch and returning a text version.

```php
echo GitInfo::commitsBehind($branch = 'master', $return_text = true);
```

### PHP

```php
use Bluora\LaravelGitInfo\GitInfo;

echo (new GitInfo())->version();
```

## Contributing

Please see [CONTRIBUTING](https://github.com/bluora/laravel-git-info/blob/master/CONTRIBUTING.md) for details.

## Credits

* [Rocco Howard](https://github.com/therocis)
* [All Contributors](https://github.com/bluora/laravel-git-info/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/bluora/laravel-git-info/blob/master/LICENSE) for more information.