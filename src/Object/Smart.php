<?php


namespace Valous\Core\Object;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
abstract class Smart
{
    protected function __construct()
    {
    }

    /**
     * @param mixed ...$args
     * @return Handler
     * @throws \ReflectionException
     */
    public static function create(...$args)
    {
        $class    = get_called_class();
        $instance = new $class(...$args);

        return new Handler($instance);
    }
}
