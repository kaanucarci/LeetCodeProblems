<?php
/**
 * Implement the myAtoi(string s) function, which converts a string to a 32-bit signed integer.
 *
 * The algorithm for myAtoi(string s) is as follows:
 *
 * Whitespace: Ignore any leading whitespace (" ").
 * Signedness: Determine the sign by checking if the next character is '-' or '+', assuming positivity if neither present.
 * Conversion: Read the integer by skipping leading zeros until a non-digit character is encountered or the end of the string is reached. If no digits were read, then the result is 0.
 * Rounding: If the integer is out of the 32-bit signed integer range [-231, 231 - 1], then round the integer to remain in the range. Specifically, integers less than -231 should be rounded to -231, and integers greater than 231 - 1 should be rounded to 231 - 1.
 * Return the integer as the final result.
 *
 *
 *
 * Example 1:
 *
 * Input: s = "42"
 *
 * Output: 42
 *
 * Explanation:
 *
 * The underlined characters are what is read in and the caret is the current reader position.
 * Step 1: "42" (no characters read because there is no leading whitespace)
 * ^
 * Step 2: "42" (no characters read because there is neither a '-' nor '+')
 * ^
 * Step 3: "42" ("42" is read in)
 *
 * Constraints:
 *
 * 0 <= s.length <= 200
 * s consists of English letters (lower-case and upper-case), digits (0-9), ' ', '+', '-', and '.'.
 */

function myAtoi(string $s): int
{
    $s = preg_replace('/^\s+|\s+$/u', '', $s);

    if (isValidInteger($s)) {
        if ($s[0] === '+') {
            $s = substr($s, 1);
        }
        return clampValue((int)$s);
    }

    $chars = mb_str_split($s);
    $number = '';
    $firstChar = $chars[0] ?? '';

    if ($firstChar === '-') {
        $number = '-';
        array_shift($chars);
    } elseif ($firstChar === '+') {
        array_shift($chars);
    }

    foreach ($chars as $char) {
        if (ctype_digit($char)) {
            $number .= $char;
        } else {
            break;
        }
    }

    if ($number === '' || $number === '-' || $number === '+') {
        return 0;
    }

    return clampValue((int)$number);
}

function clampValue(int $x): int
{
    $INT_MAX = 2147483647;
    $INT_MIN = -2147483648;
    return max(min($x, $INT_MAX), $INT_MIN);
}

function isValidInteger(string $x): bool
{
    return filter_var($x, FILTER_VALIDATE_INT) !== false;
}



echo myAtoi(" ++1");