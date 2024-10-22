<?php

class TreeNode {
  public $val;
  public $left;
  public $right;

  public function __construct($val = 0, $left = null, $right = null) {
    $this->val = $val;
    $this->left = $left;
    $this->right = $right;
  }
}

class Solution {
  private $maxPathSum;

  public function kthLargestLevelSum($root, $k) {
    if($root === null) {
      return 0;
    }

    $levelSums = [];
    $queue = [$root];
    while(!empty($queue)) {
      $levelSize = count($queue);
      $levelSum = 0;

      for ($i = 0; $i < $levelSize; $i++) {
        $current = array_shift($queue);
        $levelSum += $current->val;
        if($current->left !== null) {
          $queue[] = $current->left;
        }
        if($current->right !== null) {
          $queue[] = $current->right;
        }
      }

      $levelSum[] = $levelSum;
    }

    rsort($levelSums);

    return isset($levelSums[$k - 1]) ? $levelSums[$k - 1] : 0;
  }
}

$root = new TreeNode(5);
$root->left = new TreeNode(8);
$root->right = new TreeNode(9);
$root->left->left = new TreeNode(2);
$root->left->right = new TreeNode(1);
$root->right->left = new TreeNode(3);
$root->right->right = new TreeNode(7);
$root->left->left->left = new TreeNode(4);
$root->left->left->right = new TreeNode(6);

$solution = new Solution();
$k = 2;
echo $solution->kthLargestLevelSum($root, $k); // Output: 13
?>
