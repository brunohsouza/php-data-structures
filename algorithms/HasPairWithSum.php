<?php

declare(strict_types=1);

class HasPairWithSum {

    /**
     * Brutal-force (naive) function to find a pair of items inside an array which the sum of both
     * is equal to the second parameter
     */
    public function hasPairWithSum(array $arr, int $sum)
    {
        $start = microtime(true);

        for ($i=0, $iMax = count($arr); $i <= $iMax; $i++) {
            for ($j=$i+1, $jMax = count($arr); $j <= $jMax; $j++) {
                if ($sum === $arr[$i] + $arr[$j]) {
                    echo sprintf('The pairs %d plus %d are equal %d', $arr[$i], $arr[$j], $sum) . PHP_EOL;
                }
            }
        }

        $end = microtime(true) - $start;

        echo sprintf('Call to this ' . __FUNCTION__ . ' took %s milliseconds', number_format($end, 7));
    }

    /**
     * Better version using SPL ArrayIterator feature to create a set as an ArrayObject and
     * getting all the advantages to use the SPL functions. Due to the random search in this
     * approach, it also brings more results than the first one.
     */
    public function hasPairWithSum2(array|ArrayObject $arr1, int $sum)
    {
        $start = microtime(true);

        $arr1 = new ArrayObject($arr1);
        $arrayIterator = $arr1->getIterator();

        for ($i=0; $i < $arrayIterator->count(); $i++) {
            if ($arrayIterator->offsetExists($arrayIterator[$i])) {
                echo sprintf(
                        PHP_EOL . 'The pairs %d plus %d are equal %d',
                        $arrayIterator->current(),
                        $sum - $arrayIterator->current(),
                        $sum) .
                    PHP_EOL;
            }
            $arrayIterator->next();
        }

        $end = microtime(true) - $start;

        echo sprintf('Call to this ' . __FUNCTION__ . ' took %s milliseconds', number_format($end, 7));

        return false;
    }
}

(new HasPairWithSum())->hasPairWithSum([6,4,3,2,1,7], 9);
(new HasPairWithSum())->hasPairWithSum2([6,4,3,2,1,7], 9);
