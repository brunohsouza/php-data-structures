<?php
declare(strict_types=1);

class ReverseString
{
    private array $reverse = [];

    public function reverseStringInteractive(string $word): string
    {
        $reverse = [];
        for ($i=0, $iMax = strlen($word); $i <= $iMax; $i++) {
            $reverse[] = $word[strlen($word) - $i];
        }

        return implode('', $reverse);
    }

    public function reverseStringRecursive(string $word)
    {
        $this->reverse[] = $word[strlen($word) - count($this->reverse)];

        if (count($this->reverse) <= strlen($word)) {
            return $this->reverseStringRecursive($word);
        }

        return implode($this->reverse);
    }
}

echo (new ReverseString()->reverseStringInteractive('A man a plan a canal Panama')) . PHP_EOL;
echo (new ReverseString()->reverseStringRecursive('A man a plan a canal Panama'));