<?php

namespace Tests;

use App\Movie;
use PHPUnit_Framework_TestCase;

class MovieTest extends PHPUnit_Framework_TestCase
{
    /** @var Movie 一般向け映画 */
    private $regularMovie;

    /** @var Movie 新作映画 */
    private $newReleaseMovie;

    /** @var Movie 子供向け映画 */
    private $childMovie;

    protected function setUp()
    {
        $this->regularMovie = new Movie('一般向け映画', Movie::REGULAR);
        $this->newReleaseMovie = new Movie('新作映画', Movie::NEW_RELEASE);
        $this->childMovie = new Movie('子供向け映画', Movie::CHILD);
    }

    /**
     *　@test
     */
    public function testPriceCode()
    {
        $this->assertEquals(Movie::REGULAR, $this->regularMovie->getPriceCode());
        $this->assertEquals(Movie::NEW_RELEASE, $this->newReleaseMovie->getPriceCode());
        $this->assertEquals(Movie::CHILD, $this->childMovie->getPriceCode());
    }
}
