<?php

namespace Luminance\Service\phpblade\config;
class Config
{
    /**
     * @param string $key
     * @return mixed|string
     */
    public static function get(string $key): mixed
    {
        $key = explode('.', $key);
        $config = include "{$key[0]}.php";

        return $config[$key[1]] ?? "empty";
    }
}