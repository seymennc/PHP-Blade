<?php

use Dotenv\Dotenv;
use Luminance\Service\phpblade\Blade\Blade;
use Luminance\Service\phpblade\config\Config;


/**
 * @param string $key
 * @return string
 */
function config(string $key): string
{
    return Config::get($key);
}

/**
 * @param $key
 * @param $default
 * @return array|false|mixed|string|null
 */
function env($key, $default = null): mixed
{
    $dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__) . '/../');
    $dotenv->load();

    return getenv($key) ? getenv($key) : $default;
}

/**
 * @param string $name
 * @param array $params
 * @return void
 * @throws Exception
 */
function view(string $name, array $params = []): void
{
    $blade = new Blade();
    echo $blade->view($name, $params);
}
