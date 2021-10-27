<?php
/* 
PHP suporta dois recursos muito úteis conhecidos como “variável ​​variáveis” e “funções variáveis”.
O primeiro permite que você use o valor de uma variável como o nome de uma variável. 
confuso? Veja este exemplo */
$a = 100;
$b = 'a';
echo $$b;

/* 
Explicação do Exemplo acima:
Quando este script é executado e o interpretador encontra a expressão $$b, ele primeiro
determina o valor de $b, que é a string a. Em seguida, ele reavalia a expressão com
a substituiu $b por $a, retornando assim o valor da variável $a.
Da mesma forma, você pode usar o valor de uma variável como o nome de uma função;
*/


/* Qual será a saída do script a seguir? */

$x = 3 - 5 % 3;
echo $x;

/*

A. 2
B. 1
C. Null
D. True
E. 3

Resposta Correta é a B.Devido à precedência do operador, a operação do módulo é
executado primeiro, produzindo um resultado de 2 (o restante da divisão de 5 por 2).
Então, o resultado desta operação é subtraído do inteiro 3



Qual tipo de dados a variável $ a terá no final do script a seguir:

*/

$a = '1';
echo $x;

/* 
A. (int) 1
B. (string) “1”
C. (bool) True
D. (float) 1.0
E. (float) 

Resposta Correta é a letra B. Quando uma string numérica é atribuída a uma variável, ela permanece
uma string, e não é convertido até que seja necessário devido a uma operação que
requeira isto.

Qual sera a saída do script a seguir?

*/
$a = 1;
$a = $a— + 1;
echo $a

/* 
A. 2
B. 1
C. 3
D. 0
E. Nul
Resposta Correta Letra B. 
*/