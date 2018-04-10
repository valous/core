<?php

include __DIR__ . '/vendor/autoload.php';

class Test extends \Valous\Core\Object\Smart
{
    /**
     * Test constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param int $test1
     * @param $test2
     */
    public function test1($test1, $test2)
    {
        $this->test2("sddads");
    }

    /**
     * @param $test3
     */
    private function test2($test3)
    {
        var_dump($test3);
    }
}

$test = Test::create();
$test->test1(5, [5, "8"]);
