<?php

namespace Itwmw\GoCqHttp\Data;

class GetVersionInfo extends CreateData
{
    /**
     * @param string     $app_name                   应用标识, 如 go-cqhttp 固定值
     * @param string     $app_version                应用版本, 如 v0.9.40-fix4
     * @param string     $app_full_name              应用完整名称
     * @param string     $protocol_name              OneBot 标准名称 固定值
     * @param string     $protocol_version           OneBot 标准版本 固定值
     * @param string     $coolq_edition              原Coolq版本
     * @param string     $coolq_directory            原Coolq目录
     * @param string     $plugin_version             插件版本
     * @param int        $plugin_build_number        插件打包版本
     * @param string     $plugin_build_configuration 固定值
     * @param string     $runtime_version            运行版本
     * @param string     $runtime_os                 运行环境
     * @param string     $version                    应用版本, 如 v0.9.40-fix4
     */
    public function __construct(
        public readonly string $app_name,
        public readonly string $app_version,
        public readonly string $app_full_name,
        public readonly string $protocol_name,
        public readonly string $protocol_version,
        public readonly string $coolq_edition,
        public readonly string $coolq_directory,
        public readonly string $plugin_version,
        public readonly int $plugin_build_number,
        public readonly string $plugin_build_configuration,
        public readonly string $runtime_version,
        public readonly string $runtime_os,
        public readonly string $version,
        ...$args
    ) {
    }
}
