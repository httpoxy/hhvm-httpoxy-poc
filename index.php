<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

echo "<pre>\n\n";
echo "Uppercase env var: HTTP_PROXY\n";
echo "  getenv:  " . var_export(getenv('HTTP_PROXY'), true) . "\n";
echo "  _SERVER: " . var_export(isset($_SERVER['HTTP_PROXY']) ? $_SERVER['HTTP_PROXY'] : null, true) . "\n";
echo "  _ENV:    " . var_export(isset($_ENV['HTTP_PROXY']) ? $_ENV['HTTP_PROXY'] : null, true) . "\n";
echo "\n";
echo "Lowercase env var: http_proxy\n";
echo "  getenv:  " . var_export(getenv('http_proxy'), true) . "\n";
echo "  _SERVER: " . var_export(isset($_SERVER['http_proxy']) ? $_SERVER['http_proxy'] : null, true) . "\n";
echo "  _ENV:    " . var_export(isset($_ENV['http_proxy']) ? $_ENV['http_proxy'] : null, true) . "\n";
echo "\n\n</pre>";

echo "\n\n";
echo "Guzzle 6:";

$client = new GuzzleHttp\Client();
$res = $client->request('POST', 'http://example.com/', [
    'secret' => 'some-really-secret-string'
]);

echo "  Request sent and got back content:\n";
echo "<pre>\n";
echo htmlentities($res->getBody()->getContents());
echo "\n</pre>";
