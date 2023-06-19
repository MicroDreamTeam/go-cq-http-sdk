<p align="center">
  <a href="https://ishkong.github.io/go-cqhttp-docs/">
    <img src="winres/icon.png" width="180" height="180" alt="go-cqhttp">
  </a>
</p>

<div align="center">

<h2>go-cqhttp-sdk</h2>

<b>[go-cqhttp](https://github.com/Mrs4s/go-cqhttp)项目的PHP版SDK，拥有完整注释和代码提示</b>

</div>

<p align="center">
  <a href="https://raw.githubusercontent.com/MicroDreamTeam/go-cq-http-sdk/master/LICENSE">
    <img src="https://img.shields.io/github/license/MicroDreamTeam/go-cq-http-sdk" alt="license">
  </a>
  <a href="https://packagist.org/packages/itwmw/go-cq-http-sdk">
    <img src="https://img.shields.io/packagist/v/itwmw/go-cq-http-sdk" alt="release">
  </a>
    <img src="https://img.shields.io/packagist/dependency-v/itwmw/go-cq-http-sdk/php" alt="php-version">

</p>

<p align="center">
  <a href="https://docs.go-cqhttp.org/">文档</a>
  ·
  <a href="https://github.com/Mrs4s/go-cqhttp/releases">下载</a>
  ·
  <a href="https://docs.go-cqhttp.org/guide/quick_start.html">开始使用</a>
</p>

### 安装
```shell
composer require itwmw/go-cq-http-sdk
```
### 使用示例
```php
$api = new Itwmw\GoCqHttp\Api();
// 发送私聊消息
$api->message->sendMsg('测试消息', 'private', 995645888);
```
### 处理上报消息
SDK内置消息的处理：
```php
$server = $api->getServer();
```
你可以通过中间件模式来处理消息：
```php
use Itwmw\GoCqHttp\Data\Post\BasePostMessage;

$server->addHandler(function(BasePostMessage $message, \Closure $next) {
    // 处理消息
    return $next($message);
})->addHandler(function(BasePostMessage $message, \Closure $next) {
    // 处理消息
    return $next($message);
})->addHandler(function(BasePostMessage $message, \Closure $next) {
    // 处理消息
    return $next($message);
})->addHandler(function(BasePostMessage $message, \Closure $next) {
    // 处理消息
    return $next($message);
});

echo $server->handle();
```
#### 使用独立的类来处理消息
```php
use Itwmw\GoCqHttp\Data\Post\BasePostMessage;

class MessageHandle
{
    public function __invoke(BasePostMessage $message, \Closure $next)
    {
        // 处理消息
        return $next($message);
    }
}

$server->addHandler(MessageHandle::class);
```
> 也支持`callable`类型的处理器

#### 注册指定类型的处理器
```php
use Itwmw\GoCqHttp\Data\Struct\Enum\PostMessageType;
use Itwmw\GoCqHttp\Data\Post\Message\PrivateMessage;

$server->addMessageListener(PostMessageType::PRIVATE, function (PrivateMessage $message, \Closure $next) {
    // 处理消息
    return $next($message);
});
```

```php
use Itwmw\GoCqHttp\Data\Struct\Enum\PostNoticeType;
use Itwmw\GoCqHttp\Data\Post\Notice\GroupIncreaseNotice;

$server->addNoticeListener(PostNoticeType::GROUP_INCREASE, function (GroupIncreaseNotice $message, Closure $next) {
    // 处理群成员增加
    return $next($message);
});
```
> 同样也支持使用独立的类来处理消息

#### 快捷操作
部分类型的消息支持快捷操作，快捷操作的方法为 `response`，例：
```php
use Itwmw\GoCqHttp\Data\Post\Message\PrivateMessage;

$server->addMessageListener(PostMessageType::PRIVATE, function (PrivateMessage $message, \Closure $next) {
    if ('再见' === $message->message) {
        return $message->response('bye~');
    }
    return $next($message);
});
```
### 支持

<details>
<summary>Bot账号相关的Api</summary>

```php
$api->bot;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| getLoginInfo             | 获取登录号信息           |
| setQqProfile             | 设置登录号资料           |
| qiDianGetAccountInfo     | 获取企点账号信息          |
| getModelShow             | 获取在线机型             |
| setModelShow             | 设置在线机型             |
| getOnlineClients         | 获取当前账号在线客户端列表 |
</details>


<details>
<summary>好友相关的Api</summary>

```php
$api->friend;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| getStrangerInfo             | 获取陌生人信息           |
| GetFriendList             | 获取好友列表           |
| getUnidirectionalFriendList     | 获取单向好友列表          |
| deleteFriend             | 删除好友             |
| deleteUnidirectionalFriend             | 删除单向好友             |
| getOnlineClients         | 获取当前账号在线客户端列表 |
</details>


<details>
<summary>消息相关的Api</summary>

```php
$api->message;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| sendPrivateMsg             | 发送私聊消息           |
| sendGroupMsg             | 发送群聊消息           |
| sendMsg     | 发送消息          |
| getMsg             | 获取消息             |
| deleteMsg             | 撤回消息             |
| markMsgAsRead         | 标记消息已读 |
| getForwardMsg         | 获取合并转发内容 |
| sendGroupForwardMsg         | 发送合并转发 ( 群聊 ) |
| sendPrivateForwardMsg         | 发送合并转发 ( 好友 ) |
| getGroupMsgHistory         | 获取群消息历史记录 |
</details>


<details>
<summary>图片相关的Api</summary>

```php
$api->image;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| getImage                 | 获取图片信息           |
| canSendImage             | 检查是否可以发送图片           |
| ocrImage                 | 图片 OCR          |
</details>

<details>
<summary>语音相关的Api</summary>

```php
$api->record;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| getRecord                | 获取语音                |
| canSendRecord            | 检查是否可以发送语音      |
</details>

<details>
<summary>处理请求相关的Api</summary>

```php
$api->request;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| setFriendAddRequest                | 处理加好友请求                |
| setGroupAddRequest            | 处理加群请求／邀请      |
</details>


<details>
<summary>群信息相关的Api</summary>

```php
$api->groupInfo;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| getGroupInfo             | 获取群信息           |
| getGroupList             | 获取群列表           |
| getGroupMemberInfo     | 获取群成员信息          |
| getGroupMemberList             | 获取群成员列表             |
| getGroupHonorInfo             | 获取群荣誉信息             |
| getGroupSystemMsg         | 获取群系统消息 |
| getEssenceMsgList         | 获取精华消息列表 |
| getGroupAtAllRemain         | 获取群 @全体成员 剩余次数 |
</details>

<details>
<summary>群设置相关的Api</summary>

```php
$api->groupSetting;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| setGroupName             | 设置群名           |
| setGroupPortrait             | 设置群头像           |
| setGroupAdmin     | 设置群管理员          |
| setGroupCard             | 设置群名片 ( 群备注 )             |
| setGroupSpecialTitle             | 设置群组专属头衔             |
</details>

<details>
<summary>群操作相关的Api</summary>

```php
$api->groupAction;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| setGroupBan             | 群单人禁言           |
| setGroupWholeBan             | 群全员禁言           |
| setGroupAnonymousBan     | 群匿名用户禁言          |
| setEssenceMsg             | 设置精华消息             |
| deleteEssenceMsg         | 移出精华消息 |
| sendGroupSign         | 群打卡 |
| setGroupAnonymous         | 群设置匿名 |
| sendGroupNotice         | 发送群公告 |
| getGroupNotice         | 获取群公告 |
| setGroupKick         | 群组踢人 |
| setGroupLeave         | 退出群组 |
</details>

<details>
<summary>群文件相关的Api</summary>

```php
$api->groupFile;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| uploadGroupFile             | 上传群文件           |
| deleteGroupFile             | 删除群文件           |
| createGroupFileFolder     | 创建群文件文件夹          |
| deleteGroupFolder             | 删除群文件文件夹             |
| getGroupFileSystemInfo         | 获取群文件系统信息 |
| getGroupRootFiles         | 获取群根目录文件列表 |
| getGroupFilesByFolder         | 获取群子目录文件列表 |
| getGroupFileUrl         | 获取群文件资源链接 |
| uploadPrivateFile         | 上传私聊文件 |
</details>

<details>
<summary>Go-CqHttp相关的Api</summary>

```php
$api->cq;
```

| API                      | 功能                   |
| ------------------------ | ---------------------- |
| getCookies             | <span style="text-decoration: line-through;">获取 Cookies</span>           |
| getCsrfToken             | <span style="text-decoration: line-through;">获取 CSRF Token</span>           |
| getCredentials     | <span style="text-decoration: line-through;">获取 QQ 相关接口凭证</span>          |
| getVersionInfo             | 获取版本信息             |
| getStatus         | 获取状态 |
| cleanCache         | 清理缓存 |
| reloadEventFilter         | 重载事件过滤器 |
| downloadFile         | 下载文件到缓存目录 |
| checkUrlSafely         | 检查链接安全性 |
| getWordSlices         | 获取中文分词 ( 隐藏 API ) |
| handleQuickOperation         | 对事件执行快速操作 ( 隐藏 API ) |
</details>

<details>
<summary>CQ 码支持</summary>

| 对应的类                       | 功能                   |
| ----------------------------- | ---------------------- |
| `Itwmw\GoCqHttp\CqCode\Face`    | QQ 表情 |
| `Itwmw\GoCqHttp\CqCode\Record`    | 语音 |
| `Itwmw\GoCqHttp\CqCode\Video`    | 短视频 |
| `Itwmw\GoCqHttp\CqCode\At`    | @某人 |
| `Itwmw\GoCqHttp\CqCode\Share`    | 链接分享 |
| `Itwmw\GoCqHttp\CqCode\Music`    | 音乐分享 |
| `Itwmw\GoCqHttp\CqCode\MusicCustom`    | 自定义音乐分享 |
| `Itwmw\GoCqHttp\CqCode\Image`    | 图片 |
| `Itwmw\GoCqHttp\CqCode\Reply`    | 回复 |
| `Itwmw\GoCqHttp\CqCode\RedBag`    | 红包 |
| `Itwmw\GoCqHttp\CqCode\Poke`    | 戳一戳 |
| `Itwmw\GoCqHttp\CqCode\Gift`    | 礼物 |
| `Itwmw\GoCqHttp\CqCode\Forward`    | 合并转发 |
| `Itwmw\GoCqHttp\CqCode\Xml`    | XML 消息 |
| `Itwmw\GoCqHttp\CqCode\Json`    | JSON 消息 |
| `Itwmw\GoCqHttp\CqCode\CardImage`    | 装逼大图 |
| `Itwmw\GoCqHttp\CqCode\Tts`    | 文本转语音 |

#### 使用示例
发送：
```php
use Itwmw\GoCqHttp\Api;
use Itwmw\GoCqHttp\CqCode\Tts;

$api = new Api();
$tts = new Tts('你好');
$api->message->sendMsg($tts, user_id: 995645888);
```
解析接受到的消息：
```php
$msg = "[CQ:share,url=https://www.baidu.com/,title=百度一下,content=百度一下，你就知道,image=https://www.baidu.com/img/bd_logo1.png]";
$share = Share::create($msg);
print_r($share);
//Itwmw\GoCqHttp\CqCode\Share Object
//(
//    [url] => https://www.baidu.com/
//    [title] => 百度一下
//    [content] => 百度一下，你就知道
//    [image] => https://www.baidu.com/img/bd_logo1.png
//)
echo $share;
// [CQ:share,url=https://www.baidu.com/,title=百度一下,content=百度一下，你就知道,image=https://www.baidu.com/img/bd_logo1.png]
```
</details>

### 关于：
QQ群： 211973761
