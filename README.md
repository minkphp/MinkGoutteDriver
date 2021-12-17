Mink Goutte Driver
==================

[![Latest Stable Version](https://poser.pugx.org/behat/mink-goutte-driver/v/stable.svg)](https://packagist.org/packages/behat/mink-goutte-driver)
[![Latest Unstable Version](https://poser.pugx.org/behat/mink-goutte-driver/v/unstable.svg)](https://packagist.org/packages/behat/mink-goutte-driver)
[![Total Downloads](https://poser.pugx.org/behat/mink-goutte-driver/downloads.svg)](https://packagist.org/packages/behat/mink-goutte-driver)
[![CI](https://github.com/minkphp/MinkGoutteDriver/actions/workflows/tests.yml/badge.svg)](https://github.com/minkphp/MinkGoutteDriver/actions/workflows/tests.yml)
[![License](https://poser.pugx.org/behat/mink-goutte-driver/license.svg)](https://packagist.org/packages/behat/mink-goutte-driver)
[![codecov](https://codecov.io/gh/minkphp/MinkGoutteDriver/branch/master/graph/badge.svg?token=K7GduJsQ4A)](https://codecov.io/gh/minkphp/MinkGoutteDriver)

Usage Example
-------------

``` php
<?php

require "vendor/autoload.php";

use Behat\Mink\Mink,
    Behat\Mink\Session,
    Behat\Mink\Driver\GoutteDriver,
    Goutte\Client as GoutteClient;

$mink = new Mink(array(
    'goutte' => new Session(new GoutteDriver(new GoutteClient())),
));

$session = $mink->getSession('goutte');
$session->visit("http://php.net/");
$session->getPage()->clickLink('Downloads');
echo $session->getCurrentUrl() . PHP_EOL;
```

Installation
------------

Add a file composer.json with content:

``` json
{
    "require": {
        "behat/mink":               "^1.9",
        "behat/mink-goutte-driver": "^2.0"
    }
}
```

(or merge the above into your project's existing composer.json file)

``` bash
$> curl -sS https://getcomposer.org/installer | php
$> php composer.phar install
```

Maintainers
-----------

* Christophe Coevoet [stof](https://github.com/stof)
* Other [awesome developers](https://github.com/minkphp/MinkGoutteDriver/graphs/contributors)
