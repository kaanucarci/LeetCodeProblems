<?php
/**
 * Given a 2D array, create a structure where each cell’s value is used as a key, and its adjacent elements (top, bottom, left, right) are stored as values.
 * If the array is not multidimensional or an index is out of range, return an error message.
 *
 * Example Input: [[1,2,3], [4,5,6], [7,8,9]]
 * Example Output: {"1":[2,4], "2":[1,3,5], "3":[2,6], "4":[5,1,7], "5":[4,6,2,8], "6":[5,3,9], "7":[8,4], "8":[7,9,5], "9":[8,6]}
 *
 * Time complexity: O(n×m)
 * Space complexity: O(n×m)
 */

$multiple_array = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];
is_multiple_array($multiple_array);
action($multiple_array);

function action($array)
{
    $response = [];
    for ($x = 0; $x < count($array); $x++)
    {
        for($y = 0; $y < count($array[$x]); $y++)
        {
            $key = get_value($array, $x, $y);

            if ($y == 0)
            {
                if (!isset($response[$key])) $response[$key] = [];

                array_push($response[$key], get_value($array, $x, $y + 1));
                if ($x == 0)
                {
                    array_push($response[$key], get_value($array, $x + 1, $y));
                }
                elseif ($x == count($array[$x]) - 1)
                {
                    array_push($response[$key], get_value($array, $x - 1, $y));
                }
                else
                {
                    array_push($response[$key], get_value($array, $x + 1, $y));
                    array_push($response[$key], get_value($array, $x - 1, $y));
                }
            }
            elseif($y == count($array) - 1)
            {
                if (!isset($response[$key])) $response[$key] = [];
                array_push($response[$key], get_value($array, $x, $y - 1));
                if ($x == 0)
                {
                    array_push($response[$key], get_value($array, $x + 1, $y));
                }
                elseif ($x == count($array[$x]) - 1)
                {
                    array_push($response[$key], get_value($array, $x - 1, $y));
                }
                else
                {
                    array_push($response[$key], get_value($array, $x + 1, $y));
                    array_push($response[$key], get_value($array, $x - 1, $y));
                }
            }
            else
            {
                if (!isset($response[$key])) $response[$key] = [];
                array_push($response[$key], get_value($array, $x, $y - 1));
                array_push($response[$key], get_value($array, $x, $y + 1));
                if ($x == 0)
                {
                    array_push($response[$key], get_value($array, $x + 1, $y));
                }
                elseif ($x == count($array[$x]) - 1)
                {
                    array_push($response[$key], get_value($array, $x - 1, $y));
                }
                else
                {
                    array_push($response[$key], get_value($array, $x + 1, $y));
                    array_push($response[$key], get_value($array, $x - 1, $y));
                }
            }
        }
    }

    response($response);

}



function get_value($array, $x, $y)
{
    $response = '';

    if (isset($array[$x][$y]))
    {
        $response = $array[$x][$y];
    }
    else
    {
        response(['message' =>'Index Out of Bounds!', 'status' => 400]);
    }

    return $response;
}


function is_multiple_array($array)
{
    foreach ($array as $value)
    {
        if (!is_array($value))
        {
            response(['message' => 'Wrong Array Type!', 'value' => $array, 'status' => 400]);
        }
        else
        {
            return true;
        }
    }
}

function response($response)
{
    die(json_encode($response));
}