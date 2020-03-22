<?php

namespace App;

class Movie
{
    /** 一般向け
     *
     * @var int
     */
    const REGULAR = 0;

    /** 新着ビデオ
     *
     * @var int
     */
    const NEW_RELEASE = 1;

    /** 子供向け
     *
     * @var int
     */
    const CHILD = 2;

    /** @var string */
    private $title;

    /** @var int */
    private $priceCode;

    public function __construct($title,$priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getPriceCode()
    {
        return $this->priceCode;
    }

    /**
     * @param $arg
     */
    public function setPriceCode($arg)
    {
        $this->priceCode = $arg;
    }

    /**
     * ビデオのカテゴリとレンタル泊数に応じてポイントを返す
     *
     * @param $dayRented
     * @return float|int
     */
    public function getCharge($dayRented)
    {
        $result = 0;
        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($dayRented > 2) {
                    $result += ($dayRented - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $dayRented * 3;
                break;
            case Movie::CHILD:
                $result += 1.5;
                if ($dayRented > 3) {
                    $result += ($dayRented - 3) * 1.5;
                }
                break;
        }
        return $result;
    }

    /**
     * 新作を２日以上借りた場合は、ボーナスポイント
     *
     * @param $dayRented
     * @return int
     */
    public function getFrequentRentalPoint($dayRented)
    {
        if (($this->getPriceCode() === Movie::NEW_RELEASE) && $dayRented > 1) {
            return $frequentRentalPoints = 2;
        } else {
            return $frequentRentalPoints = 1;
        }
    }
}