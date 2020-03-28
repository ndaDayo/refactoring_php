<?php

namespace Tests;
use App\Robot;
use PHPUnit_Framework_TestCase;

class RobotTest extends PHPUnit_Framework_TestCase
{
    const Exception = 3;
    /**
     * @var Robot
     */
    protected $robot;

    protected function setUp()
    {
        $this->robot = new Robot("テストロボット");
    }

    /**
     * @test
     *
     */
    public function testOrder()
    {
        $expected_walk = 'テストロボットが歩く' . "\n";
        $expected_stop = 'テストロボットは止まる'. "\n";
        $expected_jump = 'テストロボットがジャンプする'. "\n";
        $expected_exception = RobotTest::Exception . 'のコマンドはないですよ' . "\n";

        $this->assertEquals($expected_walk, $this->robot->order(Robot::COMMAND_WALK));
        $this->assertEquals($expected_stop, $this->robot->order(Robot::COMMAND_STOP));
        $this->assertEquals($expected_jump, $this->robot->order(Robot::COMMAND_JUMP));

        $this->assertEquals($expected_exception, $this->robot->order(RobotTest::Exception));
    }
}
