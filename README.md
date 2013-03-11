## Introduction

The JoosOpenTokBundle is a simple and easy way to use TokBox OpenTok in Symfony2 applications

## Installation

composer.json

```
"require": {
    ...
    "joos/open-tok-bundle": "2.2.x-dev",
    "opentok/Opentok-PHP-SDK": "dev-master",
    ...
}
```

The official OpenTok repo (https://github.com/opentok/Opentok-PHP-SDK) is not available on packagist.org (Composer package repository) and...
"Repositories are only available to the root package and the repositories defined in your dependencies will not be loaded" (http://getcomposer.org/doc/05-repositories.md#repository)
"Why can't Composer load repositories recursively?" (http://getcomposer.org/doc/faqs/why-can%27t-composer-load-repositories-recursively.md)
So let's make the repository available...

```
"repositories": [
    ...
    {
        "type": "git",
        "url": "https://github.com/opentok/Opentok-PHP-SDK"
    },
    ...
]
```

app/AppKernel.php

```
public function registerBundles()
{
    return array(
        //...
        new Joos\OpenTokBundle\JoosOpenTokBundle(),
        //...
    );
    ...
```

## Configuration

app/config/config.yml

```
# Joos OpenTok configuration
joos_open_tok:
    class: OpenTokSDK
    key: #your OpenTok key
    secret: #your OpenTok secret
```

## Service(s)

Get the OpenTokSDK object to work with:

```
$this->get('joos_open_tok');
```

## Usage example

```
$open_tok = $this->get('joos_open_tok');

//Creating Sessions
$session = $open_tok->createSession($_SERVER["REMOTE_ADDR"]);
```
