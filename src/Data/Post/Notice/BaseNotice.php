<?php

namespace Itwmw\GoCqHttp\Data\Post\Notice;

use Itwmw\GoCqHttp\Data\Post\BasePostMessage;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostNoticeType;
use Itwmw\GoCqHttp\Exceptions\PostMessageException;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * 通知上报
 */
class BaseNotice extends BasePostMessage
{
    /** @var string 通知类型 */
    #[ExpectedValues(valuesFromClass: PostNoticeType::class)]
    public string $notice_type;

    public function response()
    {
        throw new PostMessageException('通知上报不需要响应');
    }
}
