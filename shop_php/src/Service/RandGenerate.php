<?php

namespace App\Service;

class RandGenerate
{
    public function newNumber(int $from, int $to): int
    {
        return rand($from, $to);
    }

}