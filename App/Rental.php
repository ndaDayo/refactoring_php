<?php

namespace App;

use App\Movie;

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /** @var int */
    private $dayRented;

    /**
     * Rental constructor.
     *
     * @param Movie $movie
     * @param       $dayRented
     */
    public function __construct(Movie $movie, $dayRented)
    {
        $this->movie = $movie;
        $this->dayRented = $dayRented;
    }

    /**
     * レンタルしたビデオの名前を返す
     *
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * レンタル泊数を返す
     *
     * @return int
     */
    public function getDaysRented()
    {
        return $this->dayRented;
    }

    /**
     * ビデオのカテゴリとレンタル泊数に応じてポイントを返す
     *
     * @return float|int
     */
    public function getCharge()
    {
        return $this->movie->getCharge($this->dayRented);
    }

    /**
     * 新作を２日以上借りた場合は、ボーナスポイント
     *
     * @return int
     */
    public function getFrequentRentalPoint()
    {
        return $this->movie->getFrequentRentalPoint($this->dayRented);
    }
}