<?php
declare(strict_types=1);

class Factorial
{
    public function factorialRecursive(int $n): int
    {
        if ($n <= 0) {
            return 1;
        }

        return $n * $this->factorialRecursive($n - 1);
    }

    public function factorialInteractive(int $n): int
    {
        $result = 1;
        for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
        }

        return $result;
    }
}

echo (new Factorial())->factorialRecursive(5) . PHP_EOL;
echo (new Factorial())->factorialInteractive(15);