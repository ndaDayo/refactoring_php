<?php

namespace Tests;

use App\Customer;
use App\Movie;
use App\Price\NewReleasePrice;
use App\Price\RegularPrice;
use App\Rental;
use PHPUnit_Framework_TestCase;

class CustomerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     */
    public function testGetTotalCharge()
    {
        $customer_taro = new Customer('テスト太郎');

        $movie1 = new Movie('一般向け映画1', Movie::REGULAR);
        $movie2 = new Movie('一般向け映画2', Movie::REGULAR);
        $rental1 = new Rental($movie1, 7);
        $rental2 = new Rental($movie2, 7);

        $customer_taro->addRental($rental1);
        $customer_taro->addRental($rental2);

        $regularPrice = new RegularPrice();
        $expected = $regularPrice->getCharge(7) * 2;

        $this->assertEquals($expected, $customer_taro->getTotalCharge());
    }

    /**
     * @test
     *
     */
    public function testGetTotalFrequentRentalPoint()
    {
        // 新作映画を借りた場合
        $customer_hanako = new Customer('テスト花子');

        $newReleaseMovie1 = new Movie('新作映画1', Movie::NEW_RELEASE);
        $newReleaseMovie2 = new Movie('新作映画2', Movie::NEW_RELEASE);
        $rental1 = new Rental($newReleaseMovie1, 7);
        $rental2 = new Rental($newReleaseMovie2, 7);

        $customer_hanako->addRental($rental1);
        $customer_hanako->addRental($rental2);

        $newReleasePrice = new NewReleasePrice();
        $expected_newRelease = $newReleasePrice->getFrequentRentalPoint(7) * 2;

        $this->assertSame($expected_newRelease, $customer_hanako->getTotalFrequentRentalPoint());

        // 新作以外を借りた場合は、１本につき１ポイント
        $customer_ziro = new Customer('次郎');

        $regularMovie = new Movie('一般向け映画', Movie::REGULAR);
        $childMovie = new Movie('子供向け映画', Movie::CHILD);
        $rental3 = new Rental($regularMovie, 7);
        $rental4 = new Rental($childMovie, 7);

        $customer_ziro->addRental($rental3);
        $customer_ziro->addRental($rental4);

        $expected_expectNewRelease = 2;

        $this->assertSame($expected_expectNewRelease, $customer_ziro->getTotalFrequentRentalPoint());
    }

    /**
     * @test
     *
     */
    public function testStatement()
    {
        $customer_saburo = new Customer('三郎');

        $newReleaseMovie1 = new Movie('新作映画1', Movie::NEW_RELEASE);
        $newReleaseMovie2 = new Movie('新作映画2', Movie::NEW_RELEASE);
        $rental1 = new Rental($newReleaseMovie1, 7);
        $rental2 = new Rental($newReleaseMovie2, 7);

        $customer_saburo->addRental($rental1);
        $customer_saburo->addRental($rental2);

        // 新作映画の料金は、レンタル泊数の３倍　新作映画のFrequentRentalPointは１作につき２ポイント
        $expected = 'Rental Point for 三郎' . "\n" . "\t" . '新作映画1' . "\t" . 21 . "\n" . "\t" . '新作映画2' . "\t" . 21 . "\n"
            . 'Amount owed is ' . 42 . "\n" . 'You earned ' . 4 . ' frequent renter points' . "\n";

        $this->assertEquals($expected, $customer_saburo->statement());
    }
}