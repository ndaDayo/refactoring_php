<?php
require 'vendor/autoload.php';

use App\Robot;

$robot = new Robot('パンティーロボ');

echo $robot->order(Robot::COMMAND_WALK);
echo $robot->order(Robot::COMMAND_STOP);
echo $robot->order(Robot::COMMAND_JUMP);
echo $robot->order(6);