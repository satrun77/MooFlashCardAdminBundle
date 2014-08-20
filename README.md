FlashCardAdminBundle
=============
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/20c13a16-4681-4187-9f3d-85cfff360414/mini.png)](https://insight.sensiolabs.com/projects/20c13a16-4681-4187-9f3d-85cfff360414)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/satrun77/MooFlashCardAdminBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/satrun77/MooFlashCardAdminBundle/?branch=master)

The FlashCardAdminBundle is a Symfony2 bundle that provides admin classes that be used with SonataAdminBundle.

## Features

#### Version 1.0.0
- 2 admin classes one for managing cards, and the other one for managing card categories.

## License

This bundle is under the MIT license. View the [LICENSE.md](LICENSE.md) file for the full copyright and license information.

## Installation (5 steps)

>___
> Assuming that you have [SonataAdminBundle](http://sonata-project.org/bundles/admin/master/doc/index.html) installed and configured.
>___

### 1. Download FlashCardAdminBundle with composer.

Add the following to your composer.json:

```yml
{
    "require": {
        "moo/flashcardadmin-bundle": "*"
    }
}
```

Install the bundle by executing the following command:

``` bash
$ php composer.phar update moo/flashcardadmin-bundle
```

### 2. Add the bundle configurations.

Open your application base configuration file `app/config/config.yml` and add the following to the imports section.

```yml
imports:
    # ....
    - { resource: "@MooFlashCardAdminBundle/Resources/config/admin.yml" }
```

### 3. Enable the bundle in your application kernel.

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Moo\FlashCardAdminBundle\MooFlashCardAdminBundle(),
    );
}
```

### 4. ***(optional)*** Install CRUD ACL rules for the Admin classes.

```bash
$ php app/console sonata:admin:setup-acl
```

You can read more about ACL in SonataAdmin ([here](http://sonata-project.org/bundles/admin/master/doc/reference/security.html)).

### 5. Publish bundle assets for Development and Production environments.

```bash
$ php app/console assets:install web --symlink
$ php app/console assetic:dump
```

## DONE!

- You can access the homepage of the bundle from `http://yoursite.com/app_dev.php/admin`
