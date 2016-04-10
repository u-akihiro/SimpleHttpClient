<?php

namespace SimpleHttpClient\Http;

class QueryString
{
    private $params;

    public function __construct($array = [])
    {
        if (!empty($array)) {
            $this->params = array_map([$this, 'encode'], $array);
        }
    }

    public function add($key, $value)
    {
        $this->params[$key] = $this->encode($value);
    }

    public function remove($key)
    {
        if (array_key_exists($this->params)) {
            unset($this->params[$key]);
        }
    }

    public function to_str()
    {
        if (empty($this->params)) {
            return null;
        }

        $array = [];
        foreach ($this->params as $key => $value) {
            $array[] = $key.'='.$value;
        }

        return '?'. implode('&', $array);
    }

    private function encode($value)
    {
        return urlencode($value);
    }
}
