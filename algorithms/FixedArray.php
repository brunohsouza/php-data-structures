<?php
declare(strict_types=1);

class FixedArray
{

    public function setElements()
    {
        $array1 = new SplFixedArray(5);

        $array1->offsetSet(0, 'a');
        $array1->offsetSet(1, 'b');
        $array1->offsetSet(2, 'c');
        $array1->offsetSet(3, 'd');
        $array1->offsetSet(4, 'e');

        $array1->offsetSet(0, 'z');

        try {
            $array1->offsetSet(5, 'x');

            return $array1;
        } catch (\RuntimeException) {
            throw new \Exception('the maximum size allowed for this array is 5 elements');
        }
    }
}

var_dump((new FixedArray())->setElements());
