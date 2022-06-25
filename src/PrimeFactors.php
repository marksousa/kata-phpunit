<?php

namespace App;

class PrimeFactors
{
    public function generate($number)
    {

        $factors = [];

        // 1. O numero é divisivel por 2?
        // 2. Se true, divida por 2. Se falso, vá para o próximo candidato e tente novamente.
        // 3. Repita

        for ($divisor=2; $number > 1; $divisor++) {
            for (; $number % $divisor === 0 ; $number /= $divisor) { 
                $factors[] = $divisor;
            }
        }

        return $factors;
    }
}