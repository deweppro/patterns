<?php

namespace Dewep\Patterns;

/**
 * Class Singleton
 *
 * @package Dewep\Patterns
 */
abstract class Singleton
{
    /**
     * @var array
     */
    protected static $__instance = [];

    /**
     * Singleton constructor.
     */
    final private function __construct()
    {

    }

    /**
     * @return Singleton
     */
    final public static function getInstance()
    {
        if (!isset(self::$__instance[self::__class()])) {
            self::$__instance[self::__class()] = new static();
        }

        return self::$__instance[self::__class()];
    }

    /**
     * @return string
     */
    final protected static function __class(): string
    {
        return get_called_class();
    }

    /**
     *
     */
    final private function __clone()
    {

    }


}
