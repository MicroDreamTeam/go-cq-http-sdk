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
        public string $app_name,
        public string $app_version,
        public string $app_full_name,
        public string $protocol_name,
        public string $protocol_version,
        public string $coolq_edition,
        public string $coolq_directory,
        public string $plugin_version,
        public int $plugin_build_number,
        public string $plugin_build_configuration,
        public string $runtime_version,
        public string $runtime_os,
        public string $version,
        ...$args
    ) {
    }
}
