<?php

require_once '../vendor/autoload.php';

$client = new SimpleHttpClient\HTTP\Client('https://app.rakuten.co.jp/services/api/BooksBook/Search/20130522');

$query_string = new SimpleHttpClient\HTTP\QueryString([
    'applicationId' => '1076114325239656110'
]);

$query_string->add('title', 'なれる！SE');

$response = $client->get('/', $query_string);
var_dump($response->http_response_body);
var_dump($response->http_status_code);