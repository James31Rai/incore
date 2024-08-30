<?php 

namespace Core;

class Session
{
    public static function has($key)
    {
        return (boolean) static::get($key);
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default=null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function getFlash($key)
    {
        return $_SESSION['_flash'][$key] ?? null;
    }

    public static function clearFlash()
    {
        unset($_SESSION['_flash']);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();
        session_destroy();

        $param = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $param['path'], $param['domain'], $param['secure'], $param['httponly']);
    }
}