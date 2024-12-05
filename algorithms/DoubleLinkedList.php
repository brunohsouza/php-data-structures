<?php
declare(strict_types=1);

class DoubleLinkedList {

    private SplDoublyLinkedList $list;

    public function __construct()
    {
        $this->list = new SplDoublyLinkedList();
    }

    public function append(int $value): self
    {
        $this->list->push($value);

        return $this;
    }

    public function prepend(int $value): self
    {
        $this->list->unshift($value);

        return $this;
    }

    public function insert(int $index, int $value): self
    {
        $this->list->add($index, $value);

        return $this;
    }

    public function printListAsFIFO(): void
    {
        echo 'Printing list as a queue (FIFO - First In First Out)' . PHP_EOL;
        $this->list->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO);

        $arrayList = [];
        for ($this->list->rewind(); $this->list->valid(); $this->list->next()) {
            $arrayList[] = $this->list->current();
        }

        print_r($arrayList);
        echo PHP_EOL;
    }

    public function printListAsLIFO(): void
    {
        echo 'Printing list as a Stack (LIFO - Last In First Out)' . PHP_EOL;
        $this->list->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO);

        $arrayList = [];
        for ($this->list->rewind(); $this->list->valid(); $this->list->next()) {
            $arrayList[] = $this->list->current();
        }

        print_r($arrayList);
        echo PHP_EOL;
    }
}

$linkedList = new DoubleLinkedList();

$linkedList->append(10);
$linkedList->append(5);
$linkedList->append(16);
$linkedList->prepend(1);
$linkedList->insert(2, 99);
$linkedList->printListAsFIFO();
$linkedList->printListAsLIFO();

//var_dump($linkedList);
