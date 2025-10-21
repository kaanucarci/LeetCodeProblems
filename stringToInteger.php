<?php
/**
 * @param String $s
 * @return Integer
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