<?php
    function minimumSteps($s) {

        $length = strlen($s);
        $answer = 0;
        $one_count = 0;

        for ($i = $length - 1; $i >= 0; $i--) {
            if ($s[$i] === '1') {
                $one_count++;
                $answer += ($length - $i - 1) - $one_count + 1;
            }
        }

        return $answer;
    }
?>
