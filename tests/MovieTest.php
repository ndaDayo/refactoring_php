<?php

use App\Movie;

class MovieTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Movie
     */
    protected $regularMovie;

    protected function setUp()
    {
        $this->regularMovie = new Movie('一般向けテストタイトル', Movie::REGULAR);
    }

    public function testSetPriceCode()
    {
        $expectedRegular = Movie::REGULAR;
        $this->assertEquals($expectedRegular, $this->regularMovie->getPriceCode());
    }
}
