<?php

namespace App\Status;

use App\Status\MarioStatus;

class NormalMario implements MarioStatus
{
    /**
     * @return string
     */
    public function attack()
    {
        return '....';
    }

    /**
     * @return string
     */
    public function miss()
    {
        return 'GAME OVER';
    }
}