<?php
require 'vendor/autoload.php';

use App\Robot;

$robot = new Robot('パンティーロボ');

echo $robot->order(0); // 歩く
echo $robot->order(1); // 止まる
echo $robot->order(2); // ジャンプ
