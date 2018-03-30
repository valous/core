<?php


namespace Valous\Core\Object;

use Valous\Annotation\Engine;
use Valous\Annotation\Parser\Data\Set;
use Valous\Core\Object\Shield\Detector;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
abstract class Smart
{
    /** @var Set  */
    private $childRules;

    /** @var Detector */
    private $detector;

    public function __construct()
    {
        /** @var Engine $engine */
        $engine = Engine::init();
        $this->childRules = $engine->parse($this);

        $this->detector = Detector::init();
    }


    public function __set($name, $value)
    {
        $this->detector->defence('var', $this->childRules->properties[$name], $value);
    }
}
