<?php

namespace App;

class Customer
{
    /** @var string */
    private $name;

    /** @var array */
    private $rentals = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function statement()
    {
        $totalAmount = 0;
        $frequentRentalPoints = 0;

        $result = 'Rental Point for ' . $this->getName() . "\n";

        foreach ($this->rentals as $rental) {

            $frequentRentalPoints = $rental->getFrequentRentalPoint();
            // 貸し出しに関する数値の表示
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getCharge() . "\n";
            $totalAmount += $rental->getCharge();
        }
        $result .= 'Amount owed is ' . $totalAmount . "\n";
        $result .= 'You earned ' . $frequentRentalPoints . ' frequent renter points' . "\n";

        return $result;
    }

}