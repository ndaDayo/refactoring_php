<?php

namespace Tests\Price;

use App\Movie;
use App\Price\RegularPrice;
use PHPUnit_Framework_TestCase;

class RegularTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RegularPrice
     */
    protected $regularPrice;

    protected function setUp()
    {
        $this->regularPrice = new RegularPrice;
    }

    /**
     * @test
     *
     */
    public function testGetPriceCode()
    {
        $this->assertSame(Movie::REGULAR, $this->regularPrice->getPriceCode());
    }

    /**
     * @test
     *
     */
    public function testGetCharge()
    {
        // レンタル泊数が２日以下の場合
        $dayRented = 2;
        $expectedWithin2days = 2;
        $this->assertEquals($expectedWithin2days, $this->regularPrice->getCharge($dayRented));

        // レンタル泊数が３日以上の場合
        $dayRented = 3;
        $within2daysCharge = 2;
        $expectedOver2days = ($dayRented - 2) * 1.5 + $within2daysCharge;
        $this->assertEquals($expectedOver2days, $this->regularPrice->getCharge($dayRented));
    }
}
