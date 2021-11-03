<?php
/* 
É possível usar os operadores igualdade == e identidade === para comparar matrizes.
 Quando aplicado a matrizes, o operador de igualdade retorna verdadeiro se as matrizes tiverem as mesmas chaves e valores, independentemente de seu tipo.
 O operador de identidade só retornará verdadeiro se as matrizes tiverem as mesmas chaves e valores, estiverem na mesma ordem e forem do mesmo tipo de variável.
*/
 $arr = ['1', '2', '3'];
 $brr = [1, 2, 3];
 var_dump($arr === $brr); 
 
 /*  Funções para comparação de arrays 
 
 A função array_diff () recebe uma lista de arrays como argumentos. 
 Ele retornará um array contendo os valores do primeiro array que não estavam presentes em nenhum dos outros arrays.
 Este exemplo usa array_diff () para comparar os parâmetros de entrada fornecidos na superglobal $ _POST com uma lista predefinida de parâmetros necessários.
 */
 
  $requiredKeys = ['username', 'password', 'csrf_token'];
 $missingKeys = array_diff($requiredKeys, array_keys($_POST));
 if (count($missingKeys)) {
     throw new UnexpectedValueException('You need to provide  [' . print_r($missingKeys, true) . ']');
     
 }
 
 /* 
 Este código encontra todas as chaves que estão na lista necessária, mas não na matriz post e cria uma matriz chamada $ missingKeys, que as contém. 
 Isso permite que você valide se um formulário foi completamente preenchido .array_diff_assoc () é uma versão associativa de array_diff ()
 e leva em consideração as chaves do array, bem como seus valores. 
 Para ver a diferença, podemos usar um exemplo muito simples
 */
 
  $a = ['a' => 'apple', 'b' => 'banana'];
 $b = ['a' => 'apple', 'd' => 'banana'];
 print_r(array_diff($a, $b));
 print_r(array_diff_assoc($a, $b));
 
 /*
 O resultado de array_diff () é um array vazio, mas array_diff_assoc () 
 retorna um array consistindo em [b] => banana porque a chave para o valor banana é b no primeiro array ed no segundo.
 */
 
 
 /* 
 array_intersect()
 aceita uma lista de arrays como parâmetros. Ele calcula quais valores do primeiro array também estão presentes em todos os outros arrays
 */
 
 $birds = ['duck', 'chicken', 'goose'];
 $net = ['dog', 'cat', 'chicken', 'goose', 'hamster'];
 print_r(array_intersect($net, $birds));
 
 /* Saída 
 Array(
		[2] => chicken
		[3] => goose)
 )
 */
 
 
 /* 
 
 User-Defined Matching Functions
O PHP fornece funções que permitem que você especifique sua própria função de comparação. Considere array_udiff () como um exemplo. 
Levar uma lista de parâmetros de array seguido por um chamável como o último parâmetro. 
 Vamos considerar um exemplo simples, onde queremos comparar o valor em minúsculas dos arrays entre si.
 Casos de uso mais realistas podem envolver operações mais complicadas, como em objetos, por exemplo.
 */
 
 
$birds = ['duck', 'chicken', 'goose'];
$net = ['Dog', 'Cat', 'Chicken', 'Goose', 'Hamster'];
$diff = array_udiff($net, $birds, function($a, $b){$a = strtolower($a);$b = strtolower($b);
if ($a < $b) {return -1; }
        elseif ($a > $b) {
            return 1;
        } else {
            return 0;            
        }
}
);
print_r($diff);

/* NOTE O SEGUINTE  IMPORTANTE
				-> A função de comparação deve retornar um número inteiro menor, igual ou maior que zero se o primeiro argumento for considerado respectivamente menor, igual ou maior que o segundo.
				-> Você pode usar encerramentos como "uma Call" ​​para qualquer função que receba "uma call" como parâmetro.
				-> Você pode usar funções lambdas como em uma call, também para qualquer função que receba uma call como parâmetro. No exemplo, estamos usando um função  lambda
				-> A função de comparação leva dois argumentos que serão os valores a comparar

		
		
		
		array_diff -> Percorre array buscando a diferença entre elas
		array_diff_assoc Percorre o array buscando a diferença por meio do seu indice
		

*/