<?php

declare(strict_types=1);

namespace Zenky\Tests\Fakes;

use GuzzleHttp\Psr7\Response;

class FakeResponse
{
    public static function make(array $data, int $status = 200, array $headers = [])
    {
        $headers = array_merge(['Content-Type' => 'application/json'], $headers);

        return new Response($status, $headers, json_encode($data));
    }

    public static function empty()
    {
        return new Response(204, ['Content-Type' => 'text/plain'], '');
    }

    public static function syncGate(array $merge = [])
    {
        return static::make([
            'data' => array_merge([
                'count' => 2,
                'created_count' => 2,
                'existed_count' => 0,
                'updated_count' => 0,
                'deleted_count' => 0,
                'sync_identifier' => 'testing',
            ], $merge),
        ]);
    }
}
