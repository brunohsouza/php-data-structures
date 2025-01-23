<?php

declare(strict_types=1);

class PriorityQueueWithSPL extends SplPriorityQueue
{
    public function __construct()
    {
        $this->insert('A', 1);
        $this->insert('B', 2);
        $this->insert('C', 3);
        $this->insert('D', 4);
        $this->insert('E', 2);

        $this->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
    }

    public function compare($priority1, $priority2): int
    {
        if ($priority1 === $priority2) {
            return 0;
        }

        return $priority1 < $priority2 ? -1 : 1;
    }
}

$queue = new PriorityQueueWithSPL();

while ($queue->valid()) {
    $node = $queue->current();
    echo $node['data'] . PHP_EOL;
    $queue->next();
}
