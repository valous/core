<?php


namespace Valous\Core\Object\Shield\Protection;

use Valous\Core\Object\Shield\Exception\InvalidTypeException;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
interface IProtection
{
    /**
     * @param $rules
     * @param $value
     * @throws InvalidTypeException
     * @return bool
     */
    public function protect($rules, $value);
}
