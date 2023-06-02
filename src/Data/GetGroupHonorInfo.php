<?php

namespace Itwmw\GoCqHttp\Data;

use Itwmw\GoCqHttp\Data\Struct\HonorInfo;
use Itwmw\GoCqHttp\Data\Struct\TalkativeHonorInfo;

class GetGroupHonorInfo extends CreateData
{
    /** @var TalkativeHonorInfo|null 当前龙王, 仅 type 为 talkative 或 all 时有数据 */
    public ?TalkativeHonorInfo $current_talkative;

    /** @var ArrayData<int, HonorInfo>|null 历史龙王, 仅 type 为 talkative 或 all 时有数据 */
    public ?ArrayData $talkative_list;

    /** @var ArrayData<int, HonorInfo>|null 群聊之火, 仅 type 为 performer 或 all 时有数据 */
    public ?ArrayData $performer_list;

    /** @var ArrayData<int, HonorInfo>|null 群聊炽焰, 仅 type 为 legend 或 all 时有数据 */
    public ?ArrayData $legend_list;

    /** @var ArrayData<int, HonorInfo>|null 冒尖小春笋, 仅 type 为 strong_newbie 或 all 时有数据 */
    public ?ArrayData $strong_newbie_list;

    /** @var ArrayData<int, HonorInfo>|null 快乐之源, 仅 type 为 emotion 或 all 时有数据 */
    public ?ArrayData $emotion_list;

    /**
     * @param int        $group_id           群号
     * @param array|null $current_talkative  当前龙王, 仅 type 为 talkative 或 all 时有数据
     * @param array|null $talkative_list     历史龙王, 仅 type 为 talkative 或 all 时有数据
     * @param array|null $performer_list     群聊之火, 仅 type 为 performer 或 all 时有数据
     * @param array|null $legend_list        群聊炽焰, 仅 type 为 legend 或 all 时有数据
     * @param array|null $strong_newbie_list 冒尖小春笋, 仅 type 为 strong_newbie 或 all 时有数据
     * @param array|null $emotion_list       快乐之源, 仅 type 为 emotion 或 all 时有数据
     */
    public function __construct(
        public int $group_id,
        ?array $current_talkative = null,
        ?array $talkative_list = null,
        ?array $performer_list = null,
        ?array $legend_list = null,
        ?array $strong_newbie_list = null,
        ?array $emotion_list = null,
        ...$args
    ) {
        $this->current_talkative  = $current_talkative ? TalkativeHonorInfo::create($current_talkative) : null;
        $this->talkative_list     = $talkative_list ? $this->createArrayData($talkative_list, HonorInfo::class) : null;
        $this->performer_list     = $performer_list ? $this->createArrayData($performer_list, HonorInfo::class) : null;
        $this->legend_list        = $legend_list ? $this->createArrayData($legend_list, HonorInfo::class) : null;
        $this->strong_newbie_list = $strong_newbie_list ? $this->createArrayData($strong_newbie_list, HonorInfo::class) : null;
        $this->emotion_list       = $emotion_list ? $this->createArrayData($emotion_list, HonorInfo::class) : null;
    }
}
