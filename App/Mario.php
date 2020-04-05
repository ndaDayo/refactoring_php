<?php

namespace App;

use App\Status\MarioStatus;

class Mario
{
    /** @var string */
    private $status;

    /**
     * Mario constructor.
     *
     * @param $status
     */
    public function __construct(MarioStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function jump()
    {
        return 'jump!!';
    }

    /**
     * @return string
     */
    public function attack()
    {
       return $this->status->attack();
    }

    /**
     * @return string
     */
    public function miss()
    {
       return $this->status->miss();
    }
}
