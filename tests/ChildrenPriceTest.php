<?php

namespace Tests\Price;

use App\Movie;
use App\Price\ChildrenPrice;
use PHPUnit_Framework_TestCase;

class ChildrenPriceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ChildrenPrice
     */
    protected $childrenPrice;

    protected function setUp()
    {
        $this->childrenPrice = new ChildrenPrice;
    }

    /**
     * @test
     *
     */
    public function testGetPriceCode()
    {
        $this->assertSame(Movie::CHILD, $this->childrenPrice->getPriceCode());
    }

    /**
     * @test
     *
     */
    public function testGetCharge()
    {
        // レンタル泊数が３日以下の場合
        $dayRented = 3;
        $expectedWithin3days = 1.5;
        $this->assertEquals($expectedWithin3days, $this->childrenPrice->getCharge($dayRented));

        // レンタル泊数が４日以上の場合
        $dayRented = 4;
        $within3daysCharge = 1.5;
        $expectedOver4days = ($dayRented - 3) * 1.5 + $within3daysCharge;
        $this->assertEquals($expectedOver4days, $this->childrenPrice->getCharge($dayRented));
    }
}
