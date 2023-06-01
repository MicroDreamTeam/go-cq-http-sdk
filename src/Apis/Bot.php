<?php

namespace Itwmw\GoCqHttp\Apis;

use Itwmw\GoCqHttp\Data\GetLoginInfo;
use Itwmw\GoCqHttp\Data\GetModelShow;
use Itwmw\GoCqHttp\Data\GetOnlineClients;

class Bot extends BaseApi
{
    /**
     * 获取登录号信息
     *
     * @return GetLoginInfo
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getLoginInfo(): GetLoginInfo
    {
        return $this->client->post('/get_login_info')->getData();
    }

    /**
     * 设置登录号资料
     *
     * @param string|null $nickname      名称
     * @param string|null $company       公司
     * @param string|null $email         邮箱
     * @param string|null $college       学校
     * @param string|null $personal_note 个人说明
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setQqProfile(
        ?string $nickname = null,
        ?string $company = null,
        ?string $email = null,
        ?string $college = null,
        ?string $personal_note = null
    ): void {
        $this->client->post('/set_qq_profile', [
            'form_params' => compact('nickname', 'company', 'email', 'college', 'personal_note')
        ]);
    }

    /**
     * 获取企点账号信息
     *
     * **该API只有企点协议可用**
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function qiDianGetAccountInfo(): array
    {
        return $this->client->get('/qidian_get_account_info')->getData();
    }

    /**
     * 获取在线机型
     *
     * @param string $model 机型名称
     *
     * @return GetModelShow
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getModelShow(string $model): GetModelShow
    {
        return $this->client->post('/_get_model_show', [
            'form_params' => compact('model')
        ])->getData();
    }

    /**
     * 设置在线机型
     *
     * @param string      $model      机型名称
     * @param string|null $model_show 机型展示名称
     *
     * @return void
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function setModelShow(string $model, ?string $model_show = null): void
    {
        $this->client->post('/_set_model_show', [
            'form_params' => compact('model', 'model_show')
        ]);
    }

    /**
     * 获取当前账号在线客户端列表
     *
     * @param bool $no_cache 是否无视缓存
     *
     * @return GetOnlineClients
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiException
     * @throws \Itwmw\GoCqHttp\Exceptions\ApiHttpException
     *
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getOnlineClients(bool $no_cache = false): GetOnlineClients
    {
        return $this->client->post('/get_online_clients', [
            'form_params' => compact('no_cache')
        ])->getData();
    }
}
