<?php

/*

Lambda é uma função anônima que pode ser armazenada como uma variável.

*/

 $lambda = function($a, $b) 
		{
           echo $a + $b;      
       };
       echo gettype($lambda); 
       // trueecho (int)is_callable($lambda); 
       // 1echo get_class($lambda); 
       // Closure
	   
	   /* é uma função anônima que encapsula variáveis ​​para que possam ser usadas quando 
	   suas referências originais estiverem fora do escopo. 
	   Outra forma de colocar  é dizer que a função anônima 
	   "fecha" as variáveis ​​que estão no escopo em que foi definida. 
	   Na sintaxe prática do PHP, definimos um fechamento assim:
	   */
	   
	   $string = "Hello World!";
       $closure = function() use ($string) {
           echo $string;
           
       };
       $closure();