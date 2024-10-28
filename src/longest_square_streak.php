<?php

class Solution {
  public function longestSquareStreak(array $nums): int
  {
    $s = array_flip($nums);
    $ans = -1;

    foreach($nums as $v) {
      $t = 0;
      while (isset($s[$v])) {
        $v *= $v;
        $t++;
      }
      if ($t> 1) {
        $ans = max($ans, $t);
      }
    }

    return $ans;
  }
}

?>
