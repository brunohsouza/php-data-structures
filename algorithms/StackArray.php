<?php

class StackArray
{
    public function __construct(private array $stack = [])
    {
    }

    public function peek(): int
    {
        return $this->stack[count($this->stack) - 1];
    }

    public function push(int $value): self
    {
        $this->stack[] = $value;

        return $this;
    }

    public function pop(): int
    {
        return array_pop($this->stack);
    }

    public function printStack(): void
    {
        print_r($this->stack);
    }

    public function __toString(): string
    {
        return implode(' ', $this->stack);
    }
}

$stack = new StackArray();

$stack->push(10);
$stack->push(20);
$stack->push(30);
$stack->push(40);
$stack->push(50);
$stack->printStack();
echo $stack->pop() . PHP_EOL;
$stack->printStack();
