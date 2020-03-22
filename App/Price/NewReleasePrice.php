<?php

namespace App\Price;

use App\Movie;

class NewReleasePrice extends Price
{
    /**
     * 新作の料金コードを返す
     *
     * @return int
     */
    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }

    /**
     * @param $dayRented
     * @return float|int
     */
    public function getCharge($dayRented)
    {
        return $dayRented * 3;
    }
}