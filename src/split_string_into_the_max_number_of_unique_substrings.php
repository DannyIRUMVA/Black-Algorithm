<?php

class Solution {
  private $maxUniqueSplits;
  private $seenSubstrings;

  public function maxUniqueSplit($s) {

    $this->seenSubstrings = [];
    $this->maxUniqueSplits = 0;
    $this->backtrack($s, 0, 0);

    return $this->maxUniqueSplits;
  }

  private function backtrack($s, $startIndex,$uniqueCount) {
    if ($startIndex >= strlen($s)) {
      $this->maxUniqueSplits = max($this->maxUniqueSplits, $uniqueCount);
      return;
    }

    for ($endIndex = $startIndex + 1; $endIndex <= strlen($s); $endIndex++){
      $substring = substr($s, $startIndex, $endIndex - $startIndex);

      if(!in_array($substring, $this->seenSubstrings)) {
        $this->seenSubstrings[] = $substring;

        $this->backtrack($s, $endIndex, $uniqueCount + 1);

        array_pop($this->seenSubstrings);
      }
    }
  }
}

$solution = new Solution();
echo $solution->maxUniqueSplit("aa");
?>
