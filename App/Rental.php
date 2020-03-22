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
     * ビデオのカテゴリに応じてレンタルポイントを返す
     *
     * @return float|int
     */
    public function getCharge()
    {
        $result = 0;
        switch ($this->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($this->getDaysRented() > 2) {
                    $result += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $this->getDaysRented() * 3;
                break;
            case Movie::CHILD:
                $result += 1.5;
                if ($this->getDaysRented() > 3) {
                    $result += ($this->getDaysRented() - 3) * 1.5;
                }
                break;
        }
        return $result;
    }

    /**
     * 新作を２日以上借りた場合は、ボーナスポイント
     *
     * @return int
     */
    public function getFrequentRentalPoint()
    {
        if (($this->getMovie()->getPriceCode() === Movie::NEW_RELEASE) && $this->getDaysRented() > 1) {
            return $frequentRentalPoints = 2;
        } else {
            return $frequentRentalPoints = 1;
        }
    }
}