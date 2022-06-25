<?php

namespace App;

class PrimeFactors
{
    public function generate($number)
    {

        $factors = [];
        $divisor = 2;

        // 1. O numero é divisivel por 2?
        // 2. Se true, divida por 2. Se falso, vá para o próximo candidato e tente novamente.
        // 3. Repita

        while($number > 1){
            while($number % $divisor === 0){
                $factors[] = $divisor;
    
                $number = $number / $divisor;
            }
            $divisor ++;
        }

        return $factors;
    }
}