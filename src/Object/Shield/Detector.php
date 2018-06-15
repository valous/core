<?php


namespace Valous\Core\Object\Shield;

use Valous\Core\Object\Shield\Protection\ParamProtection;
use Valous\Core\Object\Shield\Protection\VarProtection;
use Valous\Core\Pattern\Singleton;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class Detector extends Singleton
{
    private $protections = [];

    protected function __construct()
    {
        $this->protections[VarProtection::DOC_ALIAS]   = new VarProtection();
        $this->protections[ParamProtection::DOC_ALIAS] = new ParamProtection();
    }


    /**
     * @param $type
     * @param $param
     * @param $value
     * @return bool
     */
    public function defence($type, $param, $value)
    {
        if (!isset($this->protections[$type]))
        {
            return false;
        }

        return $this->protections[$type]->protect($param, $value);
    }
}
