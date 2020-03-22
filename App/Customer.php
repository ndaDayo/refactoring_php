<?php

namespace App;

class Customer
{
    /** @var string */
    private $name;

    /** @var array */
    private $rental = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rental[] = $rental;
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
        $frequentRenterPoint = 0;

        $result = 'Rental Point for ' . $this->getName() . "\n";

        foreach ($this->rental as $rental) {
            $thisAmount = $this->amountFor($rental);

            var_dump($thisAmount);
            // レンタルポイントを加算する
            $frequentRenterPoint++;

            // 新作を２日以上借りた場合は、ボーナスポイント
            if (($rental->getMovie()->getPriceCode() === Movie::NEW_RELEASE) && $rental->getDaysRented() > 1) {
                $frequentRenterPoint++;
            }
            // 貸し出しに関する数値の表示
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $thisAmount . "\n";
            $totalAmount += $thisAmount;
        }
        $result .= 'Amount owed is ' . $totalAmount . "\n";
        $result .= 'You earned ' . $frequentRenterPoint . ' frequent renter points' . "\n";

        return $result;
    }

    public function amountFor($rental)
    {
        $thisAmount = 0;
        switch ($rental->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $thisAmount += 2;
                if ($rental->getDaysRented() > 2) {
                    $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $thisAmount += $rental->getDaysRented() * 3;
                break;
            case Movie::CHILD:
                $thisAmount += 1.5;
                if ($rental->getDaysRented() > 3) {
                    $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                }
                break;
        }
        return $thisAmount;
    }
}