<?php

namespace Itwmw\GoCqHttp\Apis;

class GroupSetting extends BaseApi
{
    /**
     * 设置群名
     *
     * @param int    $group_id   群号
     * @param string $group_name 新群名
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupName(int $group_id, string $group_name): void
    {
        $this->client->post('/set_group_name', [
            'form_params' => compact('group_id', 'group_name')
        ]);
    }

    /**
     * 设置群头像
     *
     * <b>目前这个API在登录一段时间后因cookie失效而失效, 请考虑后使用</b>
     *
     * @param int    $group_id 群号
     * @param string $file     图片文件名
     * @param int    $cache    表示是否使用已缓存的文件
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupPortrait(int $group_id, string $file, int $cache = 1): void
    {
        $this->client->post('/set_group_portrait', [
            'form_params' => compact('group_id', 'file', 'cache')
        ]);
    }

    /**
     * 设置群管理员
     *
     * @param int  $group_id 群号
     * @param int  $user_id  要设置管理员的 QQ 号
     * @param bool $enable   true 为设置, false 为取消
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupAdmin(int $group_id, int $user_id, bool $enable = true): void
    {
        $this->client->post('/set_group_admin', [
            'form_params' => compact('group_id', 'user_id', 'enable')
        ]);
    }

    /**
     * 设置群名片 ( 群备注 )
     *
     * @param int    $group_id 群号
     * @param int    $user_id  要设置的 QQ 号
     * @param string $card     群名片内容, 不填或空字符串表示删除群名片
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupCard(int $group_id, int $user_id, string $card = ''): void
    {
        $this->client->post('/set_group_card', [
            'form_params' => compact('group_id', 'user_id', 'card')
        ]);
    }
    
    /**
     * 设置群组专属头衔
     *
     * @param int    $group_id      群号
     * @param int    $user_id       要设置的 QQ 号
     * @param string $special_title 专属头衔, 不填或空字符串表示删除专属头衔
     * @param int    $duration      专属头衔有效期, 单位秒, -1 表示永久, 不过此项似乎没有效果, 可能是只有某些特殊的时间长度有效, 有待测试
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setGroupSpecialTitle(int $group_id, int $user_id, string $special_title = '', int $duration = -1): void
    {
        $this->client->post('/set_group_special_title', [
            'form_params' => compact('group_id', 'user_id', 'special_title', 'duration')
        ]);
    }
}
