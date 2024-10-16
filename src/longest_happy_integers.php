<?php

class Solution {

    /**
     * @param Integer $a
     * @param Integer $b
     * @param Integer $c
     * @return String
     */
    function longestDiverseString(int $a, int $b, int $c): string {

    $result = [];

    $charStore = [
        ['a', $a],
        ['b', $b],
        ['c', $c],
    ];

    while (true) {

        usort($charStore, function ($first, $second) {
            return $second[1] - $first[1];
        });

        $hasNextCharacter = false;

        foreach ($charStore as $index => $charData) {
            [$char, $count] = $charData;

            if ($count === 0) {
                break;
            }

            $currentLength = count($result);
            if ($currentLength >= 2 && $result[$currentLength - 1] === $char && $result[$currentLength - 2] === $char) {
                continue;
            }

            $hasNextCharacter = true;
            $result[] = $char;
            $charStore[$index][1] -= 1;

            break;
        }

        if (!$hasNextCharacter) {
            break;
        }
    }

    return implode('', $result);
}

}

?>
