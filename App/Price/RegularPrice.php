<?php

namespace App\Price;

use App\Movie;

class RegularPrice extends Price
{
    /**
     * 一般向けの料金コードを返す
     *
     * @return int
     */
    public function getPriceCode()
    {
       return Movie::REGULAR;
    }

    public function getCharge($dayRented)
    {
        $result = 2;
        if ($dayRented > 2) {
            $result += ($dayRented - 2) * 1.5;
        }
        return $result;
    }
}