<?php 
/*
implementa o operador ternário no mesmo formato que outras linguagens ancestrais C.
O formato geral é o seguinte:


    condition ? expression1 : expression2;
*/
/* Se a condição for verdadeira, a expressão1 será avaliada; caso contrário, expression2 é
avaliado. */
$a = 'foo';
$b = (isset($a)) ? 'true' : 'false';
echo $b; 
/* The syntax above is identical to the following if statement: */
$a = 'foo';
if (isset($a)) {
 $b = 'true';
} else {
 $b = 'false';
}
echo $b; // true
/* Se o valor verdadeiro for omitido no operador ternário, a instrução é avaliada como
a expressão: */
$a = true;
$b = $a ?: 'foo';
echo $b; // 1

/* O operador coalescente é apenas um caso especial do operador ternário. Isso permite que você
aperfeiçoe a sintaxe usada quando você está usando isset para atribuir um valor padrão a uma variável.*/

// Long form ternary syntax
$sortDirection = (isset($_GET['sort_dir'])) ? $_GET['sort_dir'] : 'ASC';
// Equivalent syntax using the null coalescing operator
$sortDirection = $_GET['sort_dir'] ?? 'ASC';
// The null-coalesce operator can be chained
$sortDirection = $_GET['sort_dir'] ?? $defaultSortDir ?? 'ASC';
// The Elvis operator raises E_NOTICE if the GET variable is not set
$sortDirection = $_GET['sort_dir'] ?: 'ASC';
/* Spaceship operador é usado para comparar dois valores diferentes e é particularmente útil
para escrever retornos de chamada para as funções de classificação.
Ele retorna -1, 0 ou 1 quando o operando esquerdo é respectivamente menor que, igual a ou
maior do que o direito. 
1 <=> 0 1
1 <=> 1 0
1 <=> 2 -1
'apples' <=> 'Bananas' 1
'Apples' <=> 'bananas' -1


Bit Shifting também tem operadores para deslocar bits para a esquerda e para a direita. O efeito desses operadores é mudar
o padrão de bits do valor à esquerda ou à direita ao inserir bits definidos como 0 no novo
criou espaços vazios.
Para entender como esses operadores funcionam, imagine seu número representado em binário
forma e, em seguida, todos os 1s e 0s sendo movidos para a esquerda ou direita.
A tabela a seguir mostra bits móveis, um à direita e outro à esquerda.
*/
$x = 1;
echo $x << 32;
echo $x * pow(2, 32);