<?php

function isMatch($s, $p): bool
{
    if ($s === $p)
        return true;
    if (!validations($s, $p))
        return false;
    
    $starPos = strpos($p, '*');
    $dotPos  = strpos($p, '.');


    if (!$starPos) {
        if ($dotPos) {
            return strlen($s) === 1;
        } else {
            $count = substr_count($s, $p);
            return $count === 1;
        }
    } else {
        if ($p[$starPos - 1] === '.') return true;

        $chars = mb_str_split($p);
        $str   = '';
        foreach ($chars as $char) {
            if ($char === '*')
                $str = '';
            
            $str .= $char;
            $pos = strpos($s, $str);

            if ($pos !== false) return true;
        }
        return false;
    }
}

function validations($s, $p)
{
    if ($s[0] === '*') return false; // There must be a character before the * 
    if (substr_count($p, '.') > 1) return false;
    if (strlen($s) > 20 || 1 > strlen($s)) return false;
    if (strlen($p) > 20 || 1 > strlen($p)) return false;

    return true;
}


var_dump(isMatch("mississippi", "mis*is*p*."));


//To Be Continued...