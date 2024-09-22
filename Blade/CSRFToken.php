<?php

namespace Luminance\Service\phpblade\Blade;

use Random\RandomException;

class CSRFToken
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, \Closure $next): mixed
    {
        if ($request->getMethod() === 'post') {
            if (!$request->_csrf_token) {
                die(throw new \Exception("CSRF token is missing"));
            }
            $this->verify_csrf_token($request->_csrf_token);
        }
        return $next($request);
    }

    /**
     * @param $token
     * @return void
     * @throws \Exception
     */
    function verify_csrf_token($token): void
    {
        if (!isset($_SESSION['_csrf_token']) || $token !== $_SESSION['_csrf_token']) {
            throw new \Exception("Invalid CSRF token");
        }
    }

    /**
     * @throws RandomException
     */
    public static function generate(): string
    {
        if (version_compare(PHP_VERSION, '8.2.0') >= 0) {
            $data = bin2hex(random_bytes(32));
        } else {
            if (function_exists('openssl_random_pseudo_bytes')) {
                $data = bin2hex(openssl_random_pseudo_bytes(32));
            } else {
                $data = bin2hex(mt_rand(100000, 999999) . mt_rand(100000, 999999));
            }
        }
        if (!isset($_SESSION['_csrf_token'])) {
            $_SESSION['_csrf_token'] = $data;
        }
        return $_SESSION['_csrf_token'];
    }

}