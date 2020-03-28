<?php

namespace App;

class Robot
{
    /** @var string */
    public $name;

    /**
     * Robot constructor.
     *
     * @param $name
     */
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    /**
     *
     * @return string
     * @param $command
     */
    public function order(int $command)
    {
        if ($command === 0) {
            return $this->name . 'が歩く' . "\n";
        }

        if ($command === 1) {
            return $this->name . 'は止まる'. "\n";
        }

        if ($command === 2) {
            return $this->name . 'がジャンプする' . "\n";
        }
    }
}