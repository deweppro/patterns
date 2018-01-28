<?php

namespace Dewep\Patterns;

/**
 * @author Mikhail Knyazhev <markus621@gmail.com>
 */
abstract class Registry
{
    /**
     * @var array
     */
    protected static $__registry = [];

    final private function __construct()
    {

    }

    /**
     * @param string $key
     * @param $value
     */
    public static function exist(string $key, $value)
    {
        if (!self::has($key)) {
            self::set($key, $value);
        }
    }

    /**
     * @param string $key
     * @return bool
     */
    public static function has(string $key)
    {
        return isset(self::$__registry[self::__class()][$key]);
    }

    /**
     * @return string
     */
    final protected static function __class(): string
    {
        return get_called_class();
    }

    /**
     * @param string $key
     * @param $value
     */
    public static function set(string $key, $value)
    {
        self::$__registry[self::__class()][$key] = static::value($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    protected static function value($value)
    {
        return $value;
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        return self::$__registry[self::__class()][$key] ?? $default;
    }

    /**
     * @param string $key
     */
    public static function remove(string $key)
    {
        unset(self::$__registry[self::__class()][$key]);
    }

    /**
     * @return bool
     */
    public static function reset()
    {
        unset(self::$__registry[self::__class()]);

        return !isset(self::$__registry[self::__class()]);
    }

    /**
     *
     * @return array
     */
    public static function all(): array
    {
        if (!isset(self::$__registry[self::__class()])) {
            return [];
        }

        return array_keys(self::$__registry[self::__class()]);
    }

    final private function __clone()
    {

    }

}
