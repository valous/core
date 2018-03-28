<?php


namespace Valous\Core\Object;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
abstract class Smart
{
    private $child;


    /**
     * @param Smart $child
     */
    public function __construct(Smart $child)
    {
        $this->child = $child;
    }
}
