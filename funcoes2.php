
<?php
/* 
Você também pode atribuir um valor padrão a qualquer um dos parâmetros de uma função ao declarar
dessa forma, se na chamada da função, não passar nem um valor, um valor padrão será executado  em seu lugar:
*/
function calc_weeks ($my_years = 10)
{
return $my_years * 52;
}
echo calc_weeks ();

/*
Neste caso, porque nenhum valor foi passado para $my_years, o padrão de 10 será
usado pelo intérprete. Observe que você não pode atribuir um valor padrão a um parâmetro passado
por referência.
*/



/*
FUNÇÔES E ESCOPO DE VARIAVEIS



É importante notar que não há relação entre o nome de uma variável
declarado dentro de uma função e quaisquer variáveis ​​correspondentes declaradas fora dela. Em PHP,
o escopo variável funciona de maneira diferente da maioria das outras linguagens, de modo que o que reside no
o escopo global não está automaticamente disponível no escopo de uma função. Por  exemplo:
*/


function calc_weeks ()
{
$years += 10;
return $years * 52;
}
$years = 28;
echo calc_weeks ();


/* 
Neste caso particular, o script assume que a variável $years, que faz parte do
escopo global, será automaticamente incluído no escopo da função calc_weeks(). No entanto, este
não ocorre, então $years tem um valor Null dentro da função, resultando em um
valor de retorno de 0.
Se você deseja importar variáveis ​​globais dentro do escopo de uma função, você pode fazer isso
usando a declaração global, como abaixo
*/

function calc_weeks ()
{
global $years;
$years += 10;
return $years * 52;
}
$years = 28;
echo calc_weeks ();

/* 
A variável $years agora está disponível para a função, onde pode ser usada e modificada. Observe que, ao importar a variável dentro do escopo da função, todas as alterações feitas
a ele será refletido no escopo global também - em outras palavras, você estará acessando o
a própria variável, e não uma cópia ad hoc como você faria com um parâmetro passado por valor
/*


/* FUNÇÔES COM VARIAVEIS E PARAMETROS */

/* 
Às vezes é impossível saber quantos parâmetros são necessários para uma função. Você pode criar uma função que aceita um número variável de argumentos usando um
número de funções que o PHP disponibiliza.

		 func_num_args() Numeros de paramentros passado para a função
		 func_get_arg($arg_num) Retorna um parametro especifico, de acordo com a sua posição na fila de paramentro enviado
		func_get_args() Retorna array contendo todos paramentros
	
*/		 

/* Neste exemplo Calcular a média de todos o paramentros enviados para a função */

function calc_avg()
{
$args = func_num_args();
if ($args == 0)
return 0;
$sum = 0;
for ($i = 0; $i < $args; $i++)
$sum += func_get_arg($i);
return $sum / $args;
}
echo calc_avg (19, 23, 44, 1231, 2132, 11);