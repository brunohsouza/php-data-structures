<?php
declare(strict_types=1);
class Node
{
    public function __construct(public int $value, public ?Node $next = null)
    {
    }
}