<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;
use JetBrains\PhpStorm\ExpectedValues;

/**
 * 发送者的个人信息
 */
class Sender extends CreateData
{
    /**
     * @param int         $user_id  发送者 QQ 号
     * @param string      $nickname 昵称
     * @param string      $sex      性别, male 或 female 或 unknown
     * @param int         $age      年龄
     * @param int|null    $group_id 临时群消息来源群号,当私聊类型为群临时会话时的额外字段
     * @param string|null $card     群名片／备注
     * @param string|null $area     地区
     * @param string|null $level    成员等级
     * @param string|null $role     角色, owner 或 admin 或 member
     * @param string|null $title    专属头衔
     */
    public function __construct(
        public int $user_id,
        public string $nickname,
        #[ExpectedValues(values: ['male', 'female', 'unknown'])]
        public string $sex,
        public int $age,
        public ?int $group_id = null,
        public ?string $card = null,
        public ?string $area = null,
        public ?string $level = null,
        #[ExpectedValues(values: ['owner', 'admin', 'member'])]
        public ?string $role = null,
        public ?string $title = null,
        ...$args
    ) {
    }
}
