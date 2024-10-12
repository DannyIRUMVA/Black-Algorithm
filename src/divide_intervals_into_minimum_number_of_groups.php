<?php

class Solution {

  public function minGroups(array $intervals): int {
    $minHeap = [];

    usort($intervals, function($a, $b) {
      return $a[0] <=> $b[0];
    });

    foreach ($intervals as $interval) {
      list($start, $end) = $interval;
      if(!empty($minHeap) && $minHeap[0] < $start) {
        array_shift($minHeap);
      }

      $minHeap[0] = $end;
      sort($minHeap);
    }

    return count($minHeap);
  }
}

$solution = new Solution();
$intervals = [[5, 10], [6, 8], [1, 5], [2, 3], [1, 10]];
echo $solution->minGroups($intervals);
?>
