## Introduction

The JoosOpenTokBundle is a simple and easy way to use TokBox OpenTok in Symfony2 applications

## Installation

composer.json

```
"require": {
    ...
    "joos/open-tok-bundle": "2.3.x-dev",
    "opentok/opentok": "dev-master",
    ...
}
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
