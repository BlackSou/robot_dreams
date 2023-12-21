<?php
function fibonacciSum($n) {
    $sum = 0;
    $fibonacci = [0, 1];

    for ($i = 2; $i <= $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    for ($i = 0; $i <= $n; $i++) {
        $sum += $fibonacci[$i];
    }

    return $sum;
}

$n = 5;
$result = fibonacciSum($n);