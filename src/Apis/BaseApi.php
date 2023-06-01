<?php

namespace Itwmw\GoCqHttp\Apis;

use GuzzleHttp\Client;

class BaseApi
{
    public function __construct(protected Client $client)
    {
    }
}
