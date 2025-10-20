<?php

function longest_palindrome($string) {
    $lenght = strlen($string);
    if ($lenght <= 1) { return $string; }

    $start = 0;
    $max_palindrome_length = 1;

    $expand = function ($left, $right) use ($string, $lenght, &$start, &$max_palindrome_length) {
       while ($left >= 0 && $right < $lenght && $string[$left] === $string[$right]) {
           if ($right - $left + 1 > $max_palindrome_length) {
               $start = $left;
               $max_palindrome_length = $right - $left + 1;
           }
           $left--;
           $right++;
       }
    };

    for ($i = 0; $i < $lenght; $i++) {
        $expand($i, $i);
        $expand($i, $i + 1);
    }

    return substr($string, $start, $max_palindrome_length);
}

echo longest_palindrome("babad");

