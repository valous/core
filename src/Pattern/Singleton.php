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
     *
     * @param $childName
     */
    protected function __construct($childName)
    {
        $this->childName = $childName;
    }


    /**
     * @return Singleton
     */
    public final static function init()
    {
        if (!self::$instance)
        {
            $className = get_called_class();

            self::$instance = new $className();
        }

        return self::$instance;
    }
}
