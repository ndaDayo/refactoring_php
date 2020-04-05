<?php

namespace App\Status;

use App\Status\MarioStatus;

class FireMario implements MarioStatus
{
    public function attack()
    {
        return '燃えろ！くりぼ〜〜';
    }

    public function miss()
    {
        return '小さくなる';
    }
}