<?php
declare(strict_types=1);

class HashTable
{
    public function __construct(public int $size = 0, public ?ArrayObject $data = null)
    {
        if ($this->data === null) {
            $this->data = new ArrayObject();
        }
    }

    public function hash(string $key): int|string
    {
        $hash = 0;
        for ($i = 0, $iMax = strlen($key); $i < $iMax; $i++) {
            $hash = base64_encode($key);
        }

        return $hash;
    }

    public function set(string $key, mixed $value): array
    {
        $address = $this->hash($key);
        if (!$this->data->offsetExists($address)) {
            $this->data->offsetSet($address, $value);
        }

        return $this->data->getArrayCopy();
    }

    public function get(string $key): mixed
    {
        $address = $this->hash($key);

        if ($this->data->offsetExists($address)) {
            return $this->data->offsetGet($address);
        }

        return null;
    }

    public function keys(): array
    {
        return $this->data->getArrayCopy();
    }
}

$hashTable = new HashTable(50);
$hashTable->set('grapes', 10000);
$hashTable->set('apples', 54);
$hashTable->set('oranges', 2);
var_dump($hashTable->get('grapes'));
var_dump($hashTable->keys());