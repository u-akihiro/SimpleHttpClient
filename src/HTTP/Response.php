<?php

namespace SimpleHttpClient\HTTP;

class Response
{
    private $http_response_header;
    private $http_response_body;
    private $http_status_code;

    public function __construct($http_response_header, $http_response)
    {
        $this->http_response_header = $http_response_header;
        $this->http_response_body = $http_response;
        $this->extract_http_status_code();
    }

    public function __get($name)
    {
        return $this->$name;
    }

    private function extract_http_status_code()
    {
        preg_match('/\s([0-9]{3})\s/', $this->http_response_header[0], $matches);
        $this->http_status_code = $matches[1];
    }
}
