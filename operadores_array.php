<?php 

/* 
O operador + produzirá a união de duas matrizes.
Ao usar o operador + union, o PHP acrescenta a matriz à direita do operador
Para a esquerda. Se houver uma chave em ambas as matrizes, o valor da matriz esquerda será usado para a chave. */

$a = ['a' => 'ola', 'b' => 'mundo'];
$b = ['a' => 'Adeus', 'c' => 'cruel'];
echo implode(' ', $a + $b);