<?php


namespace Valous\Core\Object;

use Valous\Annotation\Engine;
use Valous\Annotation\Parser\Data\Set;
use Valous\Core\Object\Shield\Detector;


/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
class Handler
{
    /** @var Set  */
    private $childRules;

    /** @var Detector */
    private $detector;

    /** @var Smart */
    private $instance;


    /**
     * @param Smart $instance
     * @throws \ReflectionException
     */
    public function __construct(Smart $instance)
    {
        /** @var Engine $engine */
        $engine = Engine::init();
        $this->childRules = $engine->parse($instance);

        $this->detector = Detector::init();
        $this->instance = $instance;
    }


    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->detector->defence('var', $this->childRules->properties[$name], $value);
        $this->instance->$name = $value;
    }


    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->instance->$name;
    }


    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        $index = 0;
        foreach ($this->childRules->methods[$name]['param'] as $param => $value)
        {
            if (!is_int($param))
            {
                $this->detector->defence('param', ['param' => [$value]], $arguments[$index]);
            }

            $index++;
        }

        $this->instance->$name(...$arguments);
    }
}
