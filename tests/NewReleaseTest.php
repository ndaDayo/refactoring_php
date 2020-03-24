<?php

namespace Tests\Price;

use App\Movie;
use App\Price\NewReleasePrice;
use PHPUnit_Framework_TestCase;

class NewReleaseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var NewReleasePrice
     */
    protected $newReleasePrice;

    protected function setUp()
    {
        $this->newReleasePrice = new NewReleasePrice;
    }

    /**
     * @test
     *
     */
    public function testGetPriceCode()
    {
        $this->assertSame(Movie::NEW_RELEASE, $this->newReleasePrice->getPriceCode());
    }

    /**
     * @test
     *
     */
    public function testGetCharge()
    {
        $dayRented = 3;
        $expected = $dayRented * 3;
        $this->assertSame($expected, $this->newReleasePrice->getCharge($dayRented));
    }

    /**
     * @test
     *
     */
    public function testGetFrequentRentalPoint()
    {
        // レンタル泊数が１日以下の場合
        $dayRented = 1;
        $expectedWithin1days = 1;
        $this->assertSame($expectedWithin1days, $this->newReleasePrice->getFrequentRentalPoint($dayRented));

        // レンタル泊数が２日以上の場合
        $dayRented = 2;
        $expectedOver2days = 2;
        $this->assertSame($expectedOver2days, $this->newReleasePrice->getFrequentRentalPoint($dayRented));
    }
}
