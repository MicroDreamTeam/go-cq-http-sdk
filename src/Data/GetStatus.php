<?php

namespace Itwmw\GoCqHttp\Data;

use Itwmw\GoCqHttp\Data\Struct\Statistics;

class GetStatus extends CreateData
{
    /** @var Statistics 运行统计 */
    public readonly Statistics $stat;

    public readonly bool $plugins_good;

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
        public readonly bool $app_initialized,
        public readonly bool $app_enabled,
        ?bool $plugins_good,
        public readonly bool $app_good,
        public readonly bool $online,
        public readonly bool $good,
        array $stat = [],
        ...$args
    ) {
        $this->stat         = Statistics::create($stat);
        $this->plugins_good = $plugins_good ?? true;
    }
}
