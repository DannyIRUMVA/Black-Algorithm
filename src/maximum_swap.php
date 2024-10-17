<?php

class Solution {
  function maximumSwap($num) {
    $digits = str_split((string)$num);
    $length = count($digits);

    $maxDigitIndices = range(0, $length -1);

    for($i = $length - 2; $i >= 0; $i--){
      if($digits[$i] <= $digits[$maxDigitIndices[$i + 1]]){
        $maxDigitIndices[$i] = $maxDigitIndices[$i + 1];
      }
    }

    for  ($i = 0; $i < $length; $i++){
      $maxIndex = $maxDigitIndices[$i];
      if($digits[$i] < $digits[$maxIndex]) {
        [$digits[$i], $digits[$maxIndex]] = [$digits[$maxIndex], $digits[$i]];
        break;
      }
    }

    return (int)implode('', $digits);
  }
}

$num = 2736;
$test = new Solution;
$test->maximumSwap(2736);
print_r($test);
?>
