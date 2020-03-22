<?php

namespace App\Price;

use App\Movie;

class ChildrenPrice extends Price
{
    /**
     * 子供向けビデオの料金コードを返す
     *
     * @return int
     */
    public function getPriceCode()
    {
        return Movie::CHILD;
    }

    public function getCharge($dayRented)
    {
        $result = 1.5;
        if ($dayRented > 3) {
            $result += ($dayRented - 3) * 1.5;
        }
        return $result;
    }
}