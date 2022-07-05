# Code Kata with PHPUnit

Repositório para estudo e prática de técnicas de TDD usando PHPUnit

## Fatores Primos

<pre>
Ex: 100
>      100   2
>         50    2
>            25    5
>               5     5
>                  1
   100 = 2*2*5*5
</pre>

1.  O numero é divisivel por 2?
2.  true ? divida por 2 : vá para o próximo primo e tente novamente.
3.  Repita

## Números Romanos

    - 1 => I
    - 2 => II
    - 3 => III
    - 4 => IV
    - 5 => V
    - 6 => VI
    - 7 => VII
    - 8 => VIII
    - 9 => IX
    - 10 => X
    - 11 => XI
    - 14 => XIV
    - 17 => XVII
    - 19 => XIX
    - 50 => L
    - 100 => C
    - 500 => D
    - 1000 => M

## Jogo de Boliche

    - O Objetivo é derrubar todos os dez pinos
    - Cada jogada consiste em lançar a bola duas vezes e derrubar todos os pinos.
    - Se você derrubar todos os pinos com o primeiro lançamento da jogada isto é chamado "strike".
    - Se você derrubar todos os pinos utilizando o segundo lançamento da jogada isto é chamado "spare".
    - Cada jogo consiste de 10 jogadas. Se você fizer um "strike" na décima jogada você recebe mais dois lançamentos. Se fizer um "spare" recebe mais um lançamento.
    - O score é baseado no número de pinos que vocẽ derruba.
    - Contudo, se vc fizer um "spare", você consegue acumular na pontuação dessa jogada do "spare", os pinos que forem derrubados no próximo lançamento. Se for um "strike" adiciona nessa pontuação do strike os pinos que forem derrubados nos dois próximos lançamentos.

Exemplo:

// 10 => strike => 16
// 4 + 2 = 6 Proximas dois lançamentos somam 4 + 2 = 6 . Então a primeira jogada vale 16.
Subtotal: 16 + 6 = 22

ou

// 5 + 5 => spare => Próximo lançamento = 6. Então primeira jogada vale 14
// 4 + 1
Subtotal: 14 + 1 = 15

## String Calculator

https://osherove.com/tdd-kata-1

1. In a test-first manner, create a simple class class StringCalculator
   with a method public int Add(string numbers)

   1. The method can take 0, 1 or 2 numbers, and will return their sum (for an empty string it will return 0) for example “” == 0 , “1” == 1 , “1,2” == 3
   2. Start with the simplest test case of an empty string and move to one & two numbers
   3. Remember to solve things as simply as possible so that you force yourself to write tests you did not think about
   4. Remember to refactor after each passing test

2. Allow the Add method to handle an unknown amount of numbers

3. Allow the Add method to handle new lines between numbers (instead of commas).

   1. the following input is ok: “1\n2,3” == 6
   2. the following is INVALID input so do not expect it : “1,\n” (not need to write a test for it)

4. Support different delimiters: to change a delimiter, the beginning of the string will contain a separate line that looks like this:
   “//[delimiter]\n[numbers…]”
   for example
   “//;\n1;2” == 3
   since the default delimiter is ‘;’ .
   Note: All existing scenarios and tests should still be supported

5. Calling Add with a negative number will throw an exception “negatives not allowed”

6. Numbers bigger than 1000 should be ignored, for example: 2 + 1001 == 2
