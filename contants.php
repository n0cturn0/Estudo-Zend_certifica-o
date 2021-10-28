<?php
/* 
Constantes são semelhantes a variáveis, mas são imutáveis. Eles têm as mesmas regras de nomenclatura
como variáveis, mas por convenção terão nomes em maiúsculas.
Eles podem ser definidos usando o define função conforme abaixo:
*/

define('PI', 3.142);
echo PI;
define('UNITS', ['MILES_CONVERSION' => 1.6, 'INCHES_CONVERSION' => '2.54']);
echo "5km in miles is " . 5 * UNITS['MILES_CONVERSION'];
/*
 3.1425km in miles is 8
*/
/* O terceiro parâmetro de definir é opcional e indica se o nome da constante é
diferencia maiúsculas de minúsculas ou não.
Você também pode usar a palavra-chave const para definir constantes. Constantes só podem conter
matrizes ou valores escalares e não recursos ou objetos. */

const UNITS = ['MILES_CONVERSION' => 1.6,
 'INCHES_CONVERSION' => '2.54'];
echo "5km in miles is " . 5 * UNITS['MILES_CONVERSION'];
/*
 5km in miles is 8
*/
/*
Apenas a palavra-chave const pode ser usada para criar uma constante com espaço de nomes, como neste
exemplo em que criamos constantes no namespace "Foo" e, em seguida, tentamos fazer referência-los no namespace "Bar".
*/
namespace Foo;
const AVOCADO = 6.02214086;
// using define() will generate a warning
define(MOLE, 'hill');
namespace Bar;
echo \Foo\AVOCADO;
// referencing the constant we tried to define() results in a fatal error
echo \Foo\MOLE;
/* Você não pode atribuir uma variável a uma constante.
Você pode usar valores escalares estáticos para definir uma constante, como este: */
const STORAGE_PATH = __DIR__ . '/storage';