<?php

namespace App\Price;

abstract class Price
{
    /**
     * @return mixed
     */
    abstract public function getPriceCode();

    /**
     * @param $dayRented
     * @return mixed
     */
    abstract public function getCharge($dayRented);
}