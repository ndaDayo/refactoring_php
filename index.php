<?php
require 'vendor/autoload.php';

use App\Customer;
use App\Movie;
use App\Rental;

$movie = new Movie('シンドラーのリスト',0);
$rental = new Rental($movie,7);
$customer = new Customer('スティーヴン・スピルバーグ');
$customer->addRental($rental);

echo $customer->statement();