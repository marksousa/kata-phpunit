<?php

namespace App;

class StringCalculator
{
    const NUMERO_MAXIMO_PERMITIDO = 1000;
    protected $delimitador = ",|\n";
    
    public function add(string $numbers){
        if(!$numbers) {
            return 0;
        }

        $numbers = $this->parseString($numbers);

        $this->impedeNumerosNegativos($numbers);
        
        return array_sum(
            $this->ignorarNumerosMaioresque1000($numbers)
        );
    }

    protected function impedeNumerosNegativos($numbers){
        foreach ($numbers as $number) {
            if($number < 0){
                throw new \Exception("Números negativos não são permitidos.");
            }
        }

        return $this;
    }

    protected function parseString($numbers){
        $delimitadorCustomizado = "\/\/(.)\n";

        if(preg_match("/{$delimitadorCustomizado}/", $numbers, $match)){
            $this->delimitador = $match[1];
            $numbers = str_replace($match[0], '', $numbers);
        }

        return preg_split("/{$this->delimitador}/", $numbers);
    }

    protected function ignorarNumerosMaioresque1000($numbers){
        return array_filter($numbers, fn ($number) => $number <= self::NUMERO_MAXIMO_PERMITIDO);
    }
}