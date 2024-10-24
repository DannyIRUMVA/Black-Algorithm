<?php

class Solution{
  public function flipEquiv(?Tree $root1, ?TreeNode $root2): bool {
    if ($root1 === null) {
      return $root2 === null;
    }

    if ($root2 === null ){
      return $root1 === null;
    }

    if ($root1->val !== $root2->val ) {
      return false;
    }

    return ($this->flipEquiv($root1->left, $root2->left) &&
      $this->flipEquiv($root1->right, $root2->right)) ||
      ($this->flipEquiv($root1->left, $root2->right) &&
      $this-flipEquiv($root1->right, $root2->left)); 

  }

  class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null ){
      $this->val = $val;
      $this->left = $left;
      $this->right = $right;
    }
  }
}
