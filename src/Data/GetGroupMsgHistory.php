<?php

namespace Itwmw\GoCqHttp\Data;

use Itwmw\GoCqHttp\Data\Struct\Anonymous;
use Itwmw\GoCqHttp\Data\Struct\Sender;
use JetBrains\PhpStorm\ExpectedValues;

class GetGroupMsgHistory extends CreateData
{
    /** @var Sender 发送人信息 */
    public Sender $sender;

    /** @var Anonymous|null 匿名信息, 如果不是匿名消息则为 null */
    public ?Anonymous $anonymous;

    /**
     * @param string     $post_type    上报类型
     * @param string     $message_type 消息类型
     * @param int        $time         事件发生的时间戳
     * @param int        $self_id      收到事件的机器人 QQ 号
     * @param string     $sub_type     消息子类型, 正常消息是 normal, 匿名消息是 anonymous, 系统提示 ( 如「管理员已禁止群内匿名聊天」 ) 是 notice
     * @param array|null $anonymous    匿名信息, 如果不是匿名消息则为 null
     * @param int        $group_id     群号
     * @param int        $message_seq  消息序号
     * @param int        $user_id      发送者 QQ 号
     * @param int        $font         字体
     * @param string     $message      消息内容
     * @param string     $raw_message  原始消息内容
     * @param array      $sender       发送人信息
     * @param int        $message_id   消息 ID
     */
    public function __construct(
        #[ExpectedValues(values: ['message'])]
        public string $post_type,
        #[ExpectedValues(values: ['group'])]
        public string $message_type,
        public int $time,
        public int $self_id,
        #[ExpectedValues(values: ['normal', 'anonymous', 'notice'])]
        public string $sub_type,
        ?array $anonymous,
        public int $group_id,
        public int $message_seq,
        public int $user_id,
        public int $font,
        public string $message,
        public string $raw_message,
        array $sender,
        public int $message_id,
        ...$args
    ) {
        $this->sender    = Sender::create($sender);
        $this->anonymous = $anonymous ? Anonymous::create($anonymous) : null;
    }

    /**
     * @return array{
     *     post_type: string,
     *     message_type: string,
     *     time: int,
     *     self_id: int,
     *     sub_type: string,
     *     anonymous: null|array{
     *         id: int,
     *         name: string,
     *         flag: string
     *     },
     *     group_id: int,
     *     message_seq: int,
     *     user_id: int,
     *     font: int,
     *     message: string,
     *     raw_message: string,
     *     sender: array{
     *          age: int,
     *          area: string,
     *          card: string,
     *          level: string,
     *          role: string,
     *          title: string,
     *          sex: string,
     *          user_id: int,
     *          nickname: string
     *      },
     *     message_id: int
     * }
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
