<?php
/** The string "PAYPALISHIRING" is written in a zigzag pattern on a given number of rows like this: (you may want to display this pattern in a fixed font for better legibility)
 *  P   A   H   N
 *  A P L S I I G
 *  Y   I   R
 *  And then read line by line: "PAHNAPLSIIGYIR"
 *
 *  Write the code that will take a string and make this conversion given a number of rows:
 *
 *  string convert(string s, int numRows);
 *
 *
 *  Example 1:
 *
 *  Input: s = "PAYPALISHIRING", numRows = 3
 *  Output: "PAHNAPLSIIGYIR"
 *  Example 2:
 *
 *  Input: s = "PAYPALISHIRING", numRows = 4
 *  Output: "PINALSIGYAHRPI"
 *  Explanation:
 *  P     I    N
 *  A   L S  I G
 *  Y A   H R
 *  P     I
 *  Example 3:
 *
 *  Input: s = "A", numRows = 1
 *  Output: "A"
 *
 *
 *  Constraints:
 *
 *  1 <= s.length <= 1000
 *  s consists of English letters (lower-case and upper-case), ',' and '.'.
 *  1 <= numRows <= 1000
 * */

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