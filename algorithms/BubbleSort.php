<?php

const numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

class BubbleSort
{
    public function sort(array $array): array
    {
        for ($i = 0, $iMax = \count($array); $i < $iMax; ++$i) {
            for ($j = 0; $j < \count($array) - $i - 1; ++$j) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }

        return $array;
    }
}

var_dump((new BubbleSort())->sort(numbers));