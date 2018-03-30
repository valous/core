<?php


namespace Valous\Core\Pattern;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class Singleton
{
    /** @var Singleton */
    private static $instances = [];


    /**
     * Singleton constructor.
     */
    protected function __construct()
    {
    }


    /**
     * @return Singleton
     */
    public final static function init()
    {
        $className = get_called_class();

        if (!isset(self::$instances[$className]))
        {
            self::$instances[$className] = new $className();
        }

        return self::$instances[$className];
    }
}
