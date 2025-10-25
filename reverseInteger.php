<?php

/**
 * Given a signed 32-bit integer x, return x with its digits reversed. If reversing x causes the value to go outside the signed 32-bit integer range [-231, 231 - 1], then return 0.
 *
 * Assume the environment does not allow you to store 64-bit integers (signed or unsigned).
 *
 *
 *
 * Example 1:
 *
 * Input: x = 123
 * Output: 321
 * Example 2:
 *
 * Input: x = -123
 * Output: -321
 * Example 3:
 *
 * Input: x = 120
 * Output: 21
 *
 *
 * Constraints:
 *
 * -231 <= x <= 231 - 1
 *
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
