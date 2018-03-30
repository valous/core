<?php


namespace Valous\Core\Object\Shield\Protection;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class VarProtection extends StandardProtection implements IProtection
{
    const DOC_ALIAS = 'var';

    public function __construct()
    {
        parent::__construct(self::DOC_ALIAS);
    }
}
