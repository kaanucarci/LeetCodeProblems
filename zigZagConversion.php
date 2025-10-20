<?php

function convert($string, $numRows) {
    if(strlen($string) === 1)
        return $string;

    $multiple_array = [];
    $string_map = mb_str_split($string);

    for($i = 0; $i < $numRows; $i++)
    {
        $multiple_array[$i] = '';
    }

    $row = 0;
    $direction = 1;

    foreach ($string_map as $char)
    {
        $multiple_array[$row] .= $char;
        $row += $direction;

        if ($row === 0 || $row === $numRows - 1)
        {
            $direction *= -1;
        }
    }

    return implode($multiple_array);
}

echo convert("PAYPALISHIRING", 3);



//P   A   H   N
//A P L S I I G
//Y   I   R