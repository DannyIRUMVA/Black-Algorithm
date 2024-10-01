<?php

class Solution {
    public function canArrange(array $arr, int $k): bool {
        $count = array_fill(0, $k, 0);

        foreach ($arr as $a) {
            $a %= $k;
            $a = $a < 0 ? $a + $k : $a;
            $count[$a]++;
        }

        if ($count[0] % 2 !== 0) {
            return false;
        }

        for ($i = 1; $i <= $k / 2; ++$i) {
            if ($count[$i] !== $count[$k - $i]) {
                return false;
            }
        }

        return true;
    }
}
?>
