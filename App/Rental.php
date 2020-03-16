<?php

namespace App;

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /** @var int */
    private $dayRented;

    public function __construct(Movie $movie, $dayRented)
    {
        $this->movie = $movie;
        $this->dayRented = $dayRented;
    }

    /**
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @return int
     */
    public function getDayRented()
    {
        return $this->dayRented;
    }
}