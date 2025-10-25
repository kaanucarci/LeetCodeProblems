<?php
/**
 * Given a string s, find the length of the longest substring without duplicate characters.
 *
 *
 *
 * Example 1:
 *
 * Input: s = "abcabcbb"
 * Output: 3
 * Explanation: The answer is "abc", with the length of 3. Note that "bca" and "cab" are also correct answers.
 * Example 2:
 *
 * Input: s = "bbbbb"
 * Output: 1
 * Explanation: The answer is "b", with the length of 1.
 * Example 3:
 *
 * Input: s = "pwwkew"
 * Output: 3
 * Explanation: The answer is "wke", with the length of 3.
 * Notice that the answer must be a substring, "pwke" is a subsequence and not a substring.
 *
 *
 * Constraints:
 *
 * 0 <= s.length <= 5 * 104
 * s consists of English letters, digits, symbols and spaces.
 *
 */


/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s) {
    $map = [];
    $maxLen = 0;
    $start = 0;

    $chars = mb_str_split($s);
    $n = count($chars);

    for ($end = 0; $end < $n; $end++) {
        $ch = $chars[$end];


        if (isset($map[$ch]) && $map[$ch] >= $start) {
            $start = $map[$ch] + 1;
        }

        $map[$ch] = $end;
        $maxLen = max($maxLen, $end - $start + 1);
    }

    return $maxLen;
}

echo lengthOfLongestSubstring("abcabcbb");