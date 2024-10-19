<?php

class Solution {
    public function findKthBit(int $n, int $k): string {
        if ($k == 1 || $n == 1) {
            return '0';
        }
      
        $length_set = [];
        $length = $this->calculate_length($n, $length_set);
      
        if (in_array($k, $length_set)) {
            return '1';
        }
      
        if ($k < $length / 2) {
            return $this->findKthBit($n - 1, $k);
        } else {
            return $this->invert_bit($this->findKthBit($n - 1, $length - $k + 1));
        }
    }

    public function invert_bit(string $bit): string {
        return $bit === '0' ? '1' : '0';
    }

    public function calculate_length(int $n, array &$length_set): int {
        if ($n == 1) {
            return 1;
        }
    
        $current_length = 2 * $this->calculate_length($n - 1, $length_set) + 1;
        $length_set[] = (int) ($current_length / 2) + 1;
        
        return $current_length;
    }
}
?>
