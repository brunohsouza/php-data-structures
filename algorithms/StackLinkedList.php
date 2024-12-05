<?php
declare(strict_types=1);

require_once 'Node.php';

class Stack
{
    public function __construct(private ?Node $top = null, private ?Node $bottom = null, private int $length = 0)
    {
    }

    public function peek(): ?Node
    {
        return $this->top;
    }

    public function push(int $value): self
    {
        $newNode = new Node($value);

        if ($this->length === 0) {
            $this->top = $newNode;
            $this->bottom = $newNode;
        } else {
            $newNode->next = $this->top;
            $this->top = $newNode;
        }

        $this->length++;

        return $this;
    }

    public function pop(): ?Node
    {
        if ($this->length === 0) {
            return null;
        }

        if ($this->top === $this->bottom) {
            $this->bottom = null;
        }

        $node = $this->top;
        $this->top = $this->top->next;
        $this->length--;

        return $node;
    }
}

$stack = new Stack();
$stack->push(10);
$stack->push(20);
$stack->push(30);
$stack->push(40);
$stack->push(50);
print_r($stack->peek());
$stack->pop();
print_r($stack->peek());