<?php

namespace App;

class Mario
{
    /** @var string  */
    private $status = 'normal';

    /**
     * Mario constructor.
     *
     * @param $status
     */
    public function __construct($status)
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
        switch ($this->status) {
            case 'fire':
                return '燃えろ！クリボー！';
                break;
            case 'hammer':
                return 'ハンマー！';
                break;
            default:
                return '...';
                break;
        }
    }

    /**
     * @return string
     */
    public function miss()
    {
        if ($this->status !== 'normal') {
            return '小さくなる...';
        }

        return 'GAME　OVER';
    }
}
