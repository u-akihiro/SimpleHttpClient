<?php

namespace SimpleHttpClient\HTTP;

class Test
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function say()
    {
        echo 'Hello '.$this->name.PHP_EOL;
    }
}
