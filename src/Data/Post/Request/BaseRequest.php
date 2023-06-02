<?php

namespace Itwmw\GoCqHttp\Data\Post\Request;

use Itwmw\GoCqHttp\Data\Post\BasePostMessage;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostRequestType;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * 请求上报
 */
class BaseRequest extends BasePostMessage
{
    /** @var string 请求类型 */
    #[ExpectedValues(valuesFromClass: PostRequestType::class)]
    public string $request_type;
}
