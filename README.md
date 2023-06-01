<p align="center">
  <a href="https://ishkong.github.io/go-cqhttp-docs/">
    <img src="winres/icon.png" width="180" height="180" alt="go-cqhttp">
  </a>
</p>

<div align="center">

# go-cqhttp-sdk

**[go-cqhttp](https://github.com/Mrs4s/go-cqhttp)项目的PHP版SDK，拥有完整注释和代码提示**

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

### 已完成Api

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
