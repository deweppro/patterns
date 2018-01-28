<?php

namespace Dewep\Patterns;

/**
 * @author Mikhail Knyazhev <markus621@gmail.com>
 */
abstract class Singleton
{
    /**
     * @var static
     */
    protected static $__instance;

    final private function __construct()
    {

    }

    /**
     * @return Singleton
     */
    final public static function getInstance()
    {
        if (isset(self::$__instance[self::__class()])) {
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

    final private function __clone()
    {

    }


}
