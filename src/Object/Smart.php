<?php


namespace Valous\Core\Object;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
abstract class Smart
{
    protected $handler          = null;
    private static $tempHandler = null;

    /**
     * Smart constructor.
     * @throws \ReflectionException
     */
    protected function __construct()
    {
        $this->handler = self::$tempHandler = new Handler($this);
    }

    /**
     * @param mixed ...$args
     * @return Handler
     */
    public static function create(...$args)
    {
        $class    = get_called_class();
        $instance = new $class(...$args);

        return self::$tempHandler;
    }
}
