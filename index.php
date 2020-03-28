<?php
require 'vendor/autoload.php';

use App\FindInt;

$data = [1, 9, 0, 2, 8, 5, 6, 3, 4, 7];

$find = new FindInt();

if ($find->find($data, 5)) {
    echo "Found" . "\n";
} else {
    echo "Not Found" . "\n";
}
