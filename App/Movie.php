<?php

namespace App;

use App\Price\ChildrenPrice;
use App\Price\NewReleasePrice;
use App\Price\Price;
use App\Price\RegularPrice;

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

    /**
     * @var Price
     */
    private $price;

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
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
        return $this->price->getPriceCode();
    }

    /**
     * 料金コードをセット
     *
     * @param $arg
     */
    public function setPriceCode($arg)
    {
        $this->price = $arg;

        switch ($arg) {
            case Movie::REGULAR:
                $this->price = new RegularPrice();
                break;
            case Movie::NEW_RELEASE:
                $this->price = new NewReleasePrice();
                break;
            case Movie::CHILD:
                $this->price = new ChildrenPrice();
                break;
            default:
                throw new \InvalidArgumentException('不正な料金コード');
        }
    }

    /**
     * ビデオのカテゴリとレンタル泊数に応じてポイントを返す
     *
     * @param $dayRented
     * @return float|int
     */
    public function getCharge($dayRented)
    {
       return $this->price->getCharge($dayRented);
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