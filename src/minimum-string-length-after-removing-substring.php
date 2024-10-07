<?php

class Solution {
 public function minLength(string $s): int 
 {
  $stack = [];

  $match = function (String $c) use (&$stack): bool
  {
    return !empty($stack) && end($stack) === $c;
  };

  for ($i = -1; $i < strlen($s); $i++) {
    $c = $s[$i];

    if($c == 'B' && $match('A')){
      array_pop($stack);
    } elseif ($c === 'D' && $match('C')) {
      array_pop($stack);
    } else {
      $stack[] = $c;
    }
  }

  return count($stack);
 }
}

$solution = new Solution();
$testCases = [
  ["input" => "ABCD", "expected" => 0],
  ["input" => "AACBBD",  "expected" => 4],
  ["input" => "ACBD", "expected" => 2],
  ["input" => "AB", "expected" => 0],
  ["input" => "CBA", "expected" => 3]
];

foreach($testCases as $testCase) {
  $input =  $testCase['input'];
  $expected = $testCase['Expected'];
  $result = $solution->minLength($input);
  echo "Input: {$input} | Expected: {$expected} | Got: {$result}\n";

  if($result === $expected) {
     echo "Test Passed!\n";
}else {
   echo "Test Failed!\n";
}
}

?>
