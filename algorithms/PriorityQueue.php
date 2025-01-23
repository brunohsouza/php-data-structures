<?php

class PriorityQueue
{
    private $heap = []; // The heap array

    // Insert an element into the priority queue
    public function insert($data, $priority): void
    {
        $this->heap[] = ['data' => $data, 'priority' => $priority];
        $this->heapifyUp(count($this->heap) - 1);
    }

    // Extract the element with the highest priority
    public function extract()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Priority queue is empty");
        }

        // Swap the first and last element, then remove the last element
        $top = $this->heap[0];
        $this->heap[0] = $this->heap[count($this->heap) - 1];
        array_pop($this->heap);

        // Restore the heap property
        $this->heapifyDown();

        return $top;
    }

    // Check if the priority queue is empty
    public function isEmpty(): bool
    {
        return empty($this->heap);
    }

    // Restore the heap property upwards
    private function heapifyUp($index)
    {
        while ($index > 0) {
            $parentIndex = (int)(($index - 1) / 2);

            // Compare the current node with its parent
            if ($this->heap[$index]['priority'] > $this->heap[$parentIndex]['priority']) {
                $this->swap($index, $parentIndex);
                $index = $parentIndex;
            } else {
                break;
            }
        }
    }

    // Restore the heap property downwards
    private function heapifyDown(): void
    {
        $index = 0;
        $size = count($this->heap);
        while (true) {
            $leftChild = 2 * $index + 1;
            $rightChild = 2 * $index + 2;
            $largest = $index;

            // Compare with the left child
            if ($leftChild < $size && $this->heap[$leftChild]['priority'] > $this->heap[$largest]['priority']) {
                $largest = $leftChild;
            }

            // Compare with the right child
            if ($rightChild < $size && $this->heap[$rightChild]['priority'] > $this->heap[$largest]['priority']) {
                $largest = $rightChild;
            }

            // If the largest is not the current index, swap and continue
            if ($largest !== $index) {
                $this->swap($index, $largest);
                $index = $largest;
            } else {
                break;
            }
        }
    }

    // Swap two elements in the heap
    private function swap($i, $j): void
    {
        $temp = $this->heap[$i];
        $this->heap[$i] = $this->heap[$j];
        $this->heap[$j] = $temp;
    }
}

// Example usage
$queue = new PriorityQueue();

// Insert elements with priorities
$queue->insert("Task A", 3);
$queue->insert("Task B", 5);
$queue->insert("Task C", 1);
$queue->insert("Task D", 4);

// Extract elements by priority
echo "Priority Queue Output:\n";
while (!$queue->isEmpty()) {
    $item = $queue->extract();
    echo "Task: {$item['data']}, Priority: {$item['priority']}\n";
}
