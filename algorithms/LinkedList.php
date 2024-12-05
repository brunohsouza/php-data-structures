<?php
declare(strict_types=1);

require_once 'Node.php';

class LinkedList
{
    public function __construct(
        mixed $value = null,
        private ?Node $head = null,
        private ?Node $tail = null,
        private int $length = 0
    ) {
        if ($value !== null) {
            $this->head = new Node($value);
            $this->tail = $this->head;
            $this->length++;
        }
    }

    public function append(mixed $value): self
    {
        $newNode = new Node($value);

        $this->tail->next = $newNode;
        $this->tail = $newNode;
        $this->length++;

        return $this;
    }

    public function prepend(mixed $value): self
    {
        $newNode = new Node($value);

        $newNode->next = $this->head;
        $this->head = $newNode;
        $this->length++;

        return $this;
    }

    public function printList(): void
    {
        $arrayList = [];
        for ($current = $this->head; $current !== null; $current = $current->next) {
            $arrayList[] = $current->value;
        }

        print_r($arrayList);
    }

    public function insert(int $index, mixed $value): self
    {
        if ($index >= $this->length) {
            return $this->append($value);
        }


        $newNode = new Node($value);
        $leader = $this->traverseToIndex($index - 1);
        $newNode->next = $leader->next;
        $leader->next = $newNode;
        $this->length++;

        return $this;
    }

    public function traverseToIndex(int $index): Node
    {
        $counter = 0;
        $current = $this->head;

        while ($counter !== $index) {
            $current = $current->next;
            $counter++;
        }

        return $current;
    }

    public function remove(int $index): self
    {
        $leader = $this->traverseToIndex($index - 1);
        $unwantedNode = $leader->next;
        $leader->next = $unwantedNode->next;
        $this->length--;

        return $this;
    }

    public function reverse(): self
    {
        // If the list is empty or has only one element, it is already reversed
        if ($this->head === null || $this->head->next === null) {
            return $this;
        }

        $first = $this->head;
        $this->tail = $this->head;
        $second = $first->next;

        while ($second !== null) {
            $temp = $second->next;
            $second->next = $first;
            $first = $second;
            $second = $temp;
        }

        $this->head->next = null;
        $this->head = $first;

        return $this;
    }
}

$linkedList = new LinkedList(51);
$linkedList->insert(2, 99);
$linkedList->append(10);
$linkedList->append(5);
$linkedList->append(16);
$linkedList->prepend(1);
$linkedList->printList();
//$linkedList->remove(2);
$linkedList->reverse();
$linkedList->printList();