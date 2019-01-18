<?php

namespace Dewep\Patterns;

/**
 * Class Registry
 *
 * @package Dewep\Patterns
 */
abstract class Registry
{
    /**
     * @var array
     */
    protected static $__registry = [];

    /**
     * Registry constructor.
     */
    final private function __construct()
    {
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return bool
     */
    public static function exist(string $key, $value): bool
    {
        if (!self::has($key)) {
            self::set($key, $value);

            return false;
        }

        return true;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public static function has(string $key): bool
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
     * @param mixed  $value
     */
    public static function set(string $key, $value)
    {
        self::$__registry[self::__class()][$key] = static::value($value);
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    protected static function value($value)
    {
        return $value;
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
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

    /**
     *
     */
    final private function __clone()
    {

    }

}
