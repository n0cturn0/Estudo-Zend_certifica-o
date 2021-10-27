<?php
  
 /* ções  declarado usando a seguinte sintaxe: 
   function_name ([param1[, paramn]])
  */
function calc_weeks ($years)
{
return $years * 52;
}
$my_years = 30;
echo calc_weeks ($my_years);

/* 
A variável $years é criada sempre que a função calc_weeks é chamada e inicializada com o valor passado a ela. A instrução de retorno é usada para retornar um valor do
função, que então se torna disponível para o script.
Normalmente, os parâmetros são passados ​​por valor - isso significa que, no exemplo anterior, um
cópia da variável $my_years é colocada na variável $years quando a função
começa, e quaisquer alterações no último não são refletidas no primeiro. É, no entanto, possível forçar a passagem de um parâmetro por referência para que quaisquer alterações realizadas dentro do
função para ele será refletida fora do escopo da função.
*/