<?php
/**
 * Given an integer x, return true if x is a palindrome, and false otherwise.
 *
 *
 *
 * Example 1:
 *
 * Input: x = 121
 * Output: true
 * Explanation: 121 reads as 121 from left to right and from right to left.
 * Example 2:
 *
 * Input: x = -121
 * Output: false
 * Explanation: From left to right, it reads -121. From right to left, it becomes 121-. Therefore it is not a palindrome.
 * Example 3:
 *
 * Input: x = 10
 * Output: false
 * Explanation: Reads 01 from right to left. Therefore it is not a palindrome.
 *
 *
 * Constraints:
 *
 * -231 <= x <= 231 - 1
 */
function isPalindrome($x) : bool{
    if (!validate_number($x)) return false;

    $map = '';
    $parts = mb_str_split($x);

    for ($i = (count($parts) - 1); $i >= 0; $i--) {
        if ($parts[$i] == '-' || $parts[$i] == '+' || $parts[$i] == 'e') return false;
        $map .= $parts[$i];
    }

    if ($map == $x) return true;
    return false;
}

function validate_number($x) {
    $INT_MAX = 2147483647;
    $INT_MIN = -2147483648;


    if ($x > $INT_MAX || $x < $INT_MIN) {
        return false;
    }

    return true;
}
var_dump(isPalindrome(11));