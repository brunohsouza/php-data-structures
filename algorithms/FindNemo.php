<?php
declare(strict_types=1);

class FindNemo
{
    public const FISH = ['dory', 'bruce', 'marlin', 'nemo'];
    public const NEMO = ['nemo'];
    public const EVERYONE = ['dory', 'bruce', 'marlin', 'nemo', 'grill', 'bloat', 'nigel', 'squirt', 'darla', 'hank'];

    public array $large = [];

    public function __construct()
    {
        $this->large = array_fill(0, 100000, 'nemo');
    }

    public function findNemo(array $fishes)
    {
        $start = microtime(true);

        foreach ($fishes as $iValue) {
            if ('nemo' === $iValue) {
                echo 'Found Nemo!';
            }
        }

        $end = microtime(true) - $start;

        echo sprintf('Call to find Nemo took %s milliseconds', number_format($end, 7));
    }
}

$main = new FindNemo();
$main->findNemo(FindNemo::EVERYONE);