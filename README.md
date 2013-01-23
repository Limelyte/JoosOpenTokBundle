## Introduction

The JoosOpenTokBundle is a simple and easy way to use TokBox OpenTok in Symfony2 applications

## Installation

composer.json

```
"require": {
    ...
    "joos/opentok-bundle": "2.1.x-dev",
    "opentok/Opentok-PHP-SDK": "dev-master",
    ...
}
```

The official OpenTok repo (https://github.com/opentok/Opentok-PHP-SDK) is currently missing composer.json (PR: https://github.com/opentok/Opentok-PHP-SDK/pull/8), so temporarily repoint to my fork...

```
"repositories": [
    ...
    {
        "type": "git",
        "url": "https://github.com/djoos/Opentok-PHP-SDK"
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
joos_opentok:
    class: OpenTokSDK
    key: #your OpenTok key
    secret: #your OpenTok secret
```

## Service(s)

Get the OpenTokSDK object to work with:

```
$this->get('opentok');
```

## Usage example

```
$opentok = $this->get('opentok');

//Creating Sessions
$session = $opentok->createSession($_SERVER["REMOTE_ADDR"]);
```
