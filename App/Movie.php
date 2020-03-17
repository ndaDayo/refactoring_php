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
}