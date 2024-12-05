<?php

//Given an array = [2,5,1,2,3,5,1,2,4]:
//It should return 2

//Given an array = [2,1,1,2,3,5,1,2,4]:
//It should return 1

//Given an array = [2,3,4,5]:
//It should return undefined

//Bonus... What if we had this:
// [2,5,5,2,3,5,1,2,4]
// return 5 because the pairs are before 2,2

class FirstRecurringCharacter
{

    public function firstRecurringCharacter(array $array): mixed
    {
        $map = new ArrayObject($array);

        $newMap = new ArrayObject();
        for ($i = 0; $i < $map->count(); $i++) {
            if ($newMap->offsetExists($map->offsetGet($i))) {
                return $map->offsetGet($i);
            }
            $newMap->offsetSet($map->offsetGet($i), $i);
        }
    }
}

$firstRecurringCharacter = new FirstRecurringCharacter();
echo $firstRecurringCharacter->firstRecurringCharacter([2, 5, 1, 2, 3, 5, 1, 2, 4]);
echo PHP_EOL;
echo $firstRecurringCharacter->firstRecurringCharacter([2, 1, 1, 2, 3, 5, 1, 2, 4]);
echo PHP_EOL;
echo $firstRecurringCharacter->firstRecurringCharacter([2, 5, 5, 2, 3, 5, 1, 2, 4]);

