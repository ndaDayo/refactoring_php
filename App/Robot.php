<?php

namespace App;

class Robot
{
    const COMMAND_WALK = 0;
    const COMMAND_STOP = 1;
    const COMMAND_JUMP = 2;

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
     * @param $command
     * @return string
     */
    public function order(int $command)
    {
        if ($command === Robot::COMMAND_WALK) {
            return $this->name . 'が歩く' . "\n";
        } elseif ($command === Robot::COMMAND_STOP) {
            return $this->name . 'は止まる' . "\n";
        } elseif ($command === Robot::COMMAND_JUMP) {
            return $this->name . 'がジャンプする' . "\n";
        } else {
            return $command . 'のコマンドはないですよ' . "\n";
        }
    }
}