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
use Itwmw\GoCqHttp\Data\Post\PostMessageTyp;
use Itwmw\GoCqHttp\Data\Post\Message\PrivateMessage;

$server->addEventListener(PostMessageType::PRIVATE_MESSAGE, function (PrivateMessage $message, \Closure $next) {
    // 处理消息
    return $next($message);
});
```
或
```php
use Itwmw\GoCqHttp\Data\Post\Message\PrivateMessage;

$server->addEventListener(PrivateMessage::class, function (PrivateMessage $message, \Closure $next) {
    // 处理消息
    return $next($message);
});
```
> 同样也支持使用独立的类来处理消息

#### 快捷操作
部分类型的消息支持快捷操作，快捷操作的方法为 `response`，例：
```php
use Itwmw\GoCqHttp\Data\Post\Message\PrivateMessage;

$server->addEventListener(PrivateMessage::class, function (PrivateMessage $message, \Closure $next) {
    if ('再见' === $message->message) {
        return $message->response('bye~');
    }
    return $next($message);
});
```
### 已支持Api

```php
$api->bot;
```
- [x] 获取登录号信息 `getLoginInfo`
- [x] 设置登录号资料 `setQqProfile`
- [x] 获取企点账号信息 `qiDianGetAccountInfo`
- [x] 获取在线机型 `getModelShow`
- [x] 设置在线机型 `setModelShow`
- [x] 获取当前账号在线客户端列表 `getOnlineClients`

```php
$api->friend;
```
- [x] 获取陌生人信息 `getStrangerInfo`
- [x] 获取好友列表 `GetFriendList`
- [x] 获取单向好友列表 `getUnidirectionalFriendList`
- [x] 删除好友 `deleteFriend`
- [x] 删除单向好友 `deleteUnidirectionalFriend`

```php
$api->message;
```
- [x] 发送私聊消息 `sendPrivateMsg`
- [x] 发送群聊消息 `sendGroupMsg`
- [x] 发送消息 `sendMsg`
- [x] 获取消息 `getMsg`
- [x] 撤回消息 `deleteMsg`
- [x] 标记消息已读 `markMsgAsRead`
- [x] 获取合并转发内容 `getForwardMsg`
- [x] 发送合并转发 ( 群聊 ) `sendGroupForwardMsg`
- [x] 发送合并转发 ( 好友 ) `sendPrivateForwardMsg`
- [x] 获取群消息历史记录 `getGroupMsgHistory`

```php
$api->image;
```
- [x] 获取图片信息 `getImage`
- [x] 检查是否可以发送图片 `canSendImage`
- [x] 图片 OCR `ocrImage`

```php
$api->record;
```
- [x] 获取语音 `getRecord`
- [x] 检查是否可以发送语音 `canSendRecord`

```php
$api->request;
```
- [x] 处理加好友请求 `setFriendAddRequest`
- [x] 处理加群请求／邀请 `setGroupAddRequest`

```php
$api->groupInfo;
```
- [x] 获取群信息 `getGroupInfo`
- [x] 获取群列表 `getGroupList`
- [x] 获取群成员信息 `getGroupMemberInfo`
- [x] 获取群成员列表 `getGroupMemberList`
- [x] 获取群荣誉信息 `getGroupHonorInfo`
- [x] 获取群系统消息 `getGroupSystemMsg`
- [x] 获取精华消息列表 `getEssenceMsgList`
- [x] 获取群 @全体成员 剩余次数 `getGroupAtAllRemain`

```php
$api->groupSetting;
```
- [x] 设置群名 `setGroupName`
- [x] 设置群头像 `setGroupPortrait`
- [x] 设置群管理员 `setGroupAdmin`
- [x] 设置群名片 ( 群备注 ) `setGroupCard`
- [x] 设置群组专属头衔 `setGroupSpecialTitle`

```php
$api->groupAction;
```
- [x] 群单人禁言 `setGroupBan`
- [x] 群全员禁言 `setGroupWholeBan`
- [x] 群匿名用户禁言 `setGroupAnonymousBan`
- [x] 设置精华消息 `setEssenceMsg`
- [x] 移出精华消息 `deleteEssenceMsg`
- [x] 群打卡 `sendGroupSign`
- [x] 群设置匿名 `setGroupAnonymous`
- [x] 发送群公告 `sendGroupNotice`
- [x] 获取群公告 `getGroupNotice`
- [x] 群组踢人 `setGroupKick`
- [x] 退出群组 `setGroupLeave`

```php
$api->groupFile;
```
- [x] 上传群文件 `uploadGroupFile`
- [x] 删除群文件 `deleteGroupFile`
- [x] 创建群文件文件夹 `createGroupFileFolder`
- [x] 删除群文件文件夹 `deleteGroupFolder`
- [x] 获取群文件系统信息 `getGroupFileSystemInfo`
- [x] 获取群根目录文件列表 `getGroupRootFiles`
- [x] 获取群子目录文件列表 `getGroupFilesByFolder`
- [x] 获取群文件资源链接 `getGroupFileUrl`
- [x] 上传私聊文件 `uploadPrivateFile`

```php
$api->cq;
```
- [x] <span style="text-decoration: line-through;">获取 Cookies</span> `getCookies`
- [x] <span style="text-decoration: line-through;">获取 CSRF Token</span> `getCsrfToken`
- [x] <span style="text-decoration: line-through;">获取 QQ 相关接口凭证</span> `getCredentials`
- [x] 获取版本信息 `getVersionInfo`
- [x] 获取状态 `getStatus`
- [x] 清理缓存 `cleanCache`
- [x] 重载事件过滤器 `reloadEventFilter`
- [x] 下载文件到缓存目录 `downloadFile`
- [x] 检查链接安全性 `checkUrlSafely`
- [x] 获取中文分词 ( 隐藏 API ) `getWordSlices`
- [x] 对事件执行快速操作 ( 隐藏 API ) `handleQuickOperation`

### 支持的 CQ 码
- [x] QQ 表情 `Itwmw\GoCqHttp\CqCode\Face`
- [x] 语音 `Itwmw\GoCqHttp\CqCode\Record`
- [x] 短视频 `Itwmw\GoCqHttp\CqCode\Video`
- [x] @某人 `Itwmw\GoCqHttp\CqCode\At`
- [x] 链接分享 `Itwmw\GoCqHttp\CqCode\Share`
- [x] 音乐分享 `Itwmw\GoCqHttp\CqCode\Music`
- [x] 自定义音乐分享 `Itwmw\GoCqHttp\CqCode\MusicCustom`
- [x] 图片 `Itwmw\GoCqHttp\CqCode\Image`
- [x] 回复 `Itwmw\GoCqHttp\CqCode\Reply`
- [x] 红包 `Itwmw\GoCqHttp\CqCode\RedBag`
- [x] 戳一戳 `Itwmw\GoCqHttp\CqCode\Poke`
- [x] 礼物 `Itwmw\GoCqHttp\CqCode\Gift`
- [x] 合并转发 `Itwmw\GoCqHttp\CqCode\Forward`
- [x] XML 消息 `Itwmw\GoCqHttp\CqCode\Xml`
- [x] JSON 消息 `Itwmw\GoCqHttp\CqCode\Json`
- [x] 装逼大图  `Itwmw\GoCqHttp\CqCode\CardImage`
- [x] 文本转语音  `Itwmw\GoCqHttp\CqCode\Tts`

#### 使用示例
发送：
```php
use Itwmw\GoCqHttp\Api;
use Itwmw\GoCqHttp\CqCode\Tts;

$api = new Api();
$tts = new Tts('你好');
$api->message->sendMsg($tts, user_id: 995645888);
```
接受：
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
