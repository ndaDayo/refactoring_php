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
        $result = 'Rental Point for ' . $this->getName() . "\n";

        foreach ($this->rentals as $rental) {
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $this->getTotalCharge() . "\n";
        }
        $result .= 'Amount owed is ' . $this->getTotalCharge() . "\n";
        $result .= 'You earned ' . $this->getTotalFrequentRentalPoint() . ' frequent renter points' . "\n";

        return $result;
    }

    private function getTotalCharge()
    {
        $result = 0;
        foreach ($this->rentals as $rental) {
            $result = $rental->getCharge();
        }
        return $result;
    }

    private function getTotalFrequentRentalPoint()
    {
        $result = 0;
        foreach ($this->rentals as $rental) {
            $result = $rental->getFrequentRentalPoint();
        }
        return $result;
    }
}