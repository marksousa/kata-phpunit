<?php

use PHPUnit\Framework\TestCase;
use App\PrimeFactors;

/**
 * PrimeFactorsTest
 * @group group
 */
class PrimeFactorsTest extends TestCase
{
    /** 
     * @test 
     * @dataProvider factors
     * */
    public function it_generates_prime_factors_for_a_number($number, $expected)
    {
        $factors = new PrimeFactors();

        $this->assertEquals($expected, $factors->generate($number));
    }
    
    public function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [8, [2, 2, 2]],
            [100, [2, 2, 5, 5]],
            [999, [3, 3, 3, 37]],
        ];
    }
    

}