<?php


namespace Valous\Core\Object\Shield\Protection;

use Valous\Core\Object\Shield\Exception\InvalidTypeException;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
abstract class StandardProtection implements IProtection
{
    private $docAlias;

    /**
     * @param string $docAlias
     */
    public function __construct($docAlias)
    {
        $this->docAlias = $docAlias;
    }


    /**
     * @inheritdoc
     */
    public function protect($param, $value)
    {
        if (isset($param[$this->docAlias]) && isset($param[$this->docAlias][0]))
        {
            $param = $param[$this->docAlias][0];
        }
        else if (isset($param[$this->docAlias]))
        {
            $param = $param[$this[$this->docAlias]];
        }
        else
        {
            return false;
        }

        if ($param === '' || $this->checkClass($param, $value) || $this->checkScalar($param, $value))
        {
            return true;
        }

        if (($type = gettype($value)) === 'object')
        {
            $type  = get_class($value);
        }

        throw new InvalidTypeException('Variable type "' . $type . '" is not required type: ' . $param);
    }


    /**
     * @param $param
     * @param $value
     * @return bool
     */
    private function checkScalar($param, $value)
    {
        switch ($param)
        {
            case 'int':
                return is_int($value);
            case 'integer':
                return is_integer($value);
            case 'bool':
                return is_bool($value);
            case 'boolean':
                return is_bool($value);
            case 'float':
                return is_float($value);
            case 'double':
                return is_double($value);
            case 'numeric':
                return is_numeric($value);
            case 'null':
                return is_null($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            case 'object':
                return is_object($value);
            case 'long':
                return is_long($value);
        }

        return false;
    }


    /**
     * @param $param
     * @param $value
     * @return bool
     */
    private function checkClass($param, $value)
    {
        return is_object($value) && $value instanceof $param;
    }
}
