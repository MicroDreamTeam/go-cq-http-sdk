<?php

namespace Itwmw\GoCqHttp\Data\Struct;

use Itwmw\GoCqHttp\Data\CreateData;

class Status extends CreateData
{
    /** @var StatusStatistics 运行统计 */
    public StatusStatistics $stat;

    public bool $plugins_good;

    /**
     * @param bool       $app_initialized 原 CQHTTP 字段, 恒定为 true
     * @param bool       $app_enabled     原 CQHTTP 字段, 恒定为 true
     * @param bool|null  $plugins_good    原 CQHTTP 字段, 恒定为 true
     * @param bool       $app_good        原 CQHTTP 字段, 恒定为 true
     * @param bool       $online          表示BOT是否在线
     * @param bool       $good            同 online
     * @param array      $stat            运行统计
     */
    public function __construct(
        public bool $app_initialized,
        public bool $app_enabled,
        ?bool $plugins_good,
        public bool $app_good,
        public bool $online,
        public bool $good,
        array $stat = [],
        ...$args
    ) {
        $this->stat         = StatusStatistics::create($stat);
        $this->plugins_good = $plugins_good ?? false;
    }
}
