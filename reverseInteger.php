<?php

/**
 * @param Integer $x
 * @return Integer
 */
function reverse($x) {
    $numlength = strlen($x);
    if ($x >= 0 && $numlength === 1) return $x;
    if ($x < 0 && $numlength === 2) return $x;

    $reversed = 0;
    while ($x != 0){
        $digit = $x % 10;
        $x = intdiv($x, 10);

        $reversed = $reversed * 10 + $digit;
    }

    if (!validate_number($reversed))
        return 0;

    return $reversed;
}


function validate_number($x) {
    $INT_MAX = 2147483647;
    $INT_MIN = -2147483648;


    if ($x > $INT_MAX || $x < $INT_MIN) {
        return false;
    }

    return true;
}
echo reverse(-2147483412);
