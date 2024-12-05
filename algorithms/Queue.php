<?php
declare(strict_types=1);

require_once 'Node.php';

class Queue
{
    public function __construct(private ?Node $first = null, private ?Node $last = null, private int $length = 0)
    {
    }


    public function peek(): ?Node
    {
        return $this->first;
    }

    public function enqueue(int $value): self
    {
        $newNode = new Node($value);

        if ($this->length === 0) {
            $this->first = $newNode;
            $this->last = $newNode;
        } else {
            $this->last->next = $newNode;
            $this->last = $newNode;
        }

        $this->length++;

        return $this;
    }

    public function dequeue(): ?Node
    {
        if ($this->length === 0) {
            return null;
        }

        if ($this->first === $this->last) {
            $this->last = null;
        }

        $node = $this->first;
        $this->first = $this->first->next;
        $this->length--;

        return $node;
    }

    public function printQueue(): void
    {
        $arrayQueue = [];
        for ($current = $this->first; $current !== null; $current = $current->next) {
            $arrayQueue[] = $current->value;
        }

        print_r($arrayQueue);
    }
}

$queue = new Queue();
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);
$queue->enqueue(40);
$queue->enqueue(50);
$queue->printQueue();
print_r($queue->dequeue());
$queue->printQueue();
