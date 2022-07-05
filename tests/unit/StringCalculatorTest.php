<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    function avalia_uma_string_vazia_como_0()
    {
        $calculator = new StringCalculator();

        $this->assertSame(0, $calculator->add(''));
    }

    /** @test */
    function avalia_a_soma_de_apenas_um_numero()
    {
        $calculator = new StringCalculator();

        $this->assertSame(1, $calculator->add('1'));
    }

    /** @test */
    function avalia_a_soma_de_dois_numeros()
    {
        $calculator = new StringCalculator();

        $this->assertSame(3, $calculator->add('1,2'));
    }

    /** @test */
    function avalia_a_soma_de_qualquer_quantidade_de_numeros()
    {
        $calculator = new StringCalculator();

        $this->assertSame(25, $calculator->add('1,2,7,15'));
    }

    /** @test */
    function aceita_tambem_caracter_quebra_de_linha_como_delimitador()
    {
        $calculator = new StringCalculator();

        $this->assertSame(6, $calculator->add("1\n2,3"));
    }

    /** @test */
    function numeros_negativos_nao_sao_permitidos()
    {
        $calculator = new StringCalculator();

        $this->expectException(\Exception::class);

        $calculator->add('5,-4');
    }

    /** @test */
    function numeros_maiores_que_1000_sao_ignorados()
    {
        $calculator = new StringCalculator();

        $this->assertSame(1, $calculator->add("1, 1001"));
    }

    /** @test */
    function aceita_outros_delimitadores()
    {
        $calculator = new StringCalculator();

        $this->assertSame(103, $calculator->add("//:\n1:2:100"));
    }
}