<?php

namespace Tests;

use App\Customer;
use App\Movie;
use App\Price\RegularPrice;
use App\Rental;
use PHPUnit_Framework_TestCase;

class CustomerTest extends PHPUnit_Framework_TestCase
{
    /** @var Customer */
    protected $customer;

    /** @var array  */
    private $rentals = [];

    protected function setUp()
    {
        $this->customer = new Customer('テスト太郎');
    }

    /**
     * @test
     */
    public function testGetTotalCharge()
    {
        $movie1 = new Movie('一般向け映画1',Movie::REGULAR);
        $movie2 = new Movie('一般向け映画2',Movie::REGULAR);
        $rental1 = new Rental($movie1,7);
        $rental2 = new Rental($movie2,7);

        $this->customer->addRental($rental1);
        $this->customer->addRental($rental2);

        $regularPrice = new RegularPrice();
        $expected = $regularPrice->getCharge(7) * 2;

        $this->assertEquals($expected,$this->customer->getTotalCharge());
    }
}
