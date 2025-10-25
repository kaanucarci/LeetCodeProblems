<?php
/**
 * You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.
 * You may assume the two numbers do not contain any leading zero, except the number 0 itself.
 *
 * Example 1:
 *
 * Input: l1 = [2,4,3], l2 = [5,6,4]
 * Output: [7,0,8]
 * Explanation: 342 + 465 = 807.
 *
 * Constraints:
 *
 * The number of nodes in each linked list is in the range [1, 100].
 * 0 <= Node.val <= 9
 * It is guaranteed that the list represents a number that does not have leading zeros.
 */

function addTwoNumbers($l1, $l2) {
    $arr1 = listNodeToArray($l1);
    $arr2 = listNodeToArray($l2);

    $number_l1 = implode('', array_reverse($arr1));
    $number_l2 = implode('', array_reverse($arr2));

    $total_num = bcadd($number_l1, $number_l2);

    $total_array = array_reverse(str_split($total_num));

    return arrayToListNode($total_array);
}

function listNodeToArray(?ListNode $node): array {
    $result = [];
    while ($node !== null) {
        $result[] = $node->val;
        $node = $node->next;
    }
    return $result;
}

function arrayToListNode(array $arr): ?ListNode {
    $dummy = new ListNode();
    $current = $dummy;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummy->next;
}

var_dump(addTwoNumbers([2,4,3], [5,6,4]));