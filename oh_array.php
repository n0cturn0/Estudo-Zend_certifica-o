<?php

/* array_shift() Desloca um elemento do início do array 

*/
$stack = array("Flamengo", "São Paulo", "Comercial", "Cuiaba FC");
$fruit = array_shift($stack);
print_r($stack);


/* array_unshift()  Anexa um ou mais elementos ao início */
$carros = array("CIVIC", "FUSCA", "GOL");
array_unshift($carros, "PALIO", "Monza", "Opala");
print_r($carros);
 /*  Remove o ultimo elemento do array*/

$carros = array("CIVIC", "FUSCA", "GOL");
array_pop($carros);
print_r($carros);
	
	/* colocar os elemento para o final do array */
$stack = array("php", "java");
array_push($stack, "node", "jquery");
print_r($stack);