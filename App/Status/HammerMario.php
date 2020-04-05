<?php

namespace App\Status;

use App\Status\MarioStatus;

class HammerMario implements MarioStatus
{
    /**
     * @return string
     */
    public function attack()
    {
        return "はんまーーー！";
    }

    /**
     * @return string
     */
    public function miss()
    {
        return '小さくなる';
    }
}