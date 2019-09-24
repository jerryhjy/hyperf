<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace HyperfTest\Guzzle\Stub;

use Hyperf\Guzzle\CoroutineHandler;
use Swoole\Coroutine\Http\Client;

class CoroutineHandlerStub extends CoroutineHandler
{
    public function checkStatusCode(Client $client, $request)
    {
        return parent::checkStatusCode($client, $request);
    }

    protected function execute(Client $client, $path)
    {
        $client->body = json_encode([
            'host' => $client->host,
            'port' => $client->port,
            'ssl' => $client->ssl,
            'setting' => $client->setting,
            'method' => $client->requestMethod,
            'headers' => $client->requestHeaders,
            'uri' => $path,
        ]);
        $client->statusCode = 200;
        $client->headers = [];
    }
}
