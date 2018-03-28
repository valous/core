<?php


namespace Valous\Core\Pattern;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class Singleton
{
    /** @var Singleton */
    private static $instance = null;


    /**
     * Singleton constructor.
     */
    protected function __construct()
    {
    }


    /**
     * @return Singleton
     */
    public static function init()
    {
        if (!self::$instance)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
