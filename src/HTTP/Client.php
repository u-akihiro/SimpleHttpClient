<?php

namespace SimpleHttpClient\HTTP;

class Client
{
    private $base_url;

    public function __construct($base_url)
    {
        $this->base_url = $base_url;
    }

    public function get($path = '/', $query_string = null)
    {
        $url = $this->base_url . $path;
        if (!is_null($query_string)) {
            $url .= $query_string->to_str();
        }

        return $this->send('GET', $url);
    }

    public function post($path)
    {
        return $this->send('POST');
    }

    private function send($method, $url)
    {
        $options = [
            'http' => [
                'method' => $method,
                'ignore_errors' => true
            ]
        ];

        $context = stream_context_create($options);
        $http_response_body = file_get_contents($url, false, $context);
        return new Response($http_response_header, $http_response_body);
    }
}
