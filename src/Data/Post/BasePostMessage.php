<?php

namespace Itwmw\GoCqHttp\Data\Post;

use Itwmw\GoCqHttp\Data\CreateData;
use Itwmw\GoCqHttp\Data\Struct\Enum\PostType;
use JetBrains\PhpStorm\ExpectedValues;

class BasePostMessage extends CreateData
{
    /** @var int 事件发生的unix时间戳 */
    public int $time;

    /** @var int 收到事件的机器人的 QQ 号 */
    public int $self_id;

    /** @var string 表示该上报的类型, 消息, 消息发送, 请求, 通知, 或元事件 */
    #[ExpectedValues(valuesFromClass: PostType::class)]
    public string $post_type;

    public static function create(array $data): static
    {
        $class      = new static();
        $properties = (new \ReflectionClass($class))->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($properties as $property) {
            if (!empty($data[$property->getName()] ?? '')) {
                $type = $property->getType()?->getName();
                // 判断$type是否是CreateData的子类
                if (is_subclass_of($type, CreateData::class)) {
                    $value = $type::create($data[$property->getName()]);
                } else {
                    $value = $data[$property->getName()];
                }
                $property->setValue($class, $value);
            }
        }
        return $class;
    }
}
