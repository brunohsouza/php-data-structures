<?php
declare(strict_types=1);

class Fibonacci
{
    public function fibonacciRecursive(int $n): int
    {
        if ($n < 2) {
            return $n;
        }

        return $this->fibonacciRecursive($n - 1) + $this->fibonacciRecursive($n - 2);
    }

    public function fibonacciInteractive(int $n): int
    {
        $arr = [];
        for ($i=0; $i <= $n; $i++) {
            if ($i <= 1) {
                $arr[] = $i;
            }

            if (count($arr) >= 2) {
                $arr[] = $arr[$i] + $arr[$i-1];
            }
        }

        return $arr[$n];
    }
}

echo new Fibonacci()->fibonacciRecursive(8);
echo new Fibonacci()->fibonacciInteractive(13);