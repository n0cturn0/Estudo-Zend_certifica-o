<?php 

/* 

O conceito básico por trás da OOP é o encapsulamento - o agrupamento de dados e elementos de código que compartilham características comuns dentro de um contêiner conhecido como classe.
 As classes podem ser organizadas hierarquicamente para que qualquer um possa herdar algumas ou todas as características de
outro. Dessa forma, o novo código pode ser construído sobre o código antigo, tornando o código mais estável e confiável (pelo menos, em teoria).
Porque foi adicionado pelos designers quase como uma reflexão tardia, a implementação
de OOP no PHP 4 difere das implementações tradicionais fornecidas pela maioria das outras
linguagens no sentido de que não segue os princípios tradicionais da orientação a objetos e é,
portanto, repleto de perigos para o programador que o aborda vindo de um mais
plataforma tradicional.

TERMOS QUE VOCE PRECISA ENTENDER NA ORIENTAÇÃO OBJETO
 +Namespace
 +Class
 +Object
 +Method
 +Property
 +Class member
 +Instantiation
 +Constructor
 +Inheritance
 +Magic functio
 
 
 Técnicas que você precisa dominar
 
 +OOP Fundamentos
 +Escrevendo Classes
 +Instanciando Objetos
 +Acessar membros da classe
 +Criando diretivas da classe
 +Serializando e desserializando Objetos
 
 Começando...
*/
class my_class
{
var $my_var;
function my_class ($var)
{
$this->my_var = $my_var;
}
}
/* 
Como você pode ver aqui, a palavra-chave class é seguida pelo nome da classe, my_class
em nosso caso, e então por um bloco de código onde uma série de propriedades e métodos são
definidos.
*/

$my_var = 'um valor';

/* 
Instanciando uma classe: Obejto

*/

class my_class
{
var $my_var;
function my_class ($var)
{
$this->my_var = $my_var;
}
}
$obj = new my_class (“something”);
echo $obj->my_var

/* 
O novo operador faz com que uma nova instância da classe my_class seja criada e atribuída
para $bj. Como my_class tem um construtor, a instanciação do objeto chama automaticamente
e podemos passar parâmetros para ele diretamente.
Deste ponto em diante, as propriedades e métodos do objeto podem ser acessados ​​usando uma taxa de sincronização semelhante à que vimos na seção anterior, exceto, é claro, que $ this
não existe fora do escopo da própria classe e, em vez disso, devemos usar o nome de
a variável à qual atribuímos o objeto


NAMESPACE 

Depois que uma classe é definida, seus métodos podem ser acessados ​​de duas maneiras: dinamicamente, por
instatando um objeto, ou estaticamente, tratando a classe como um namespace. Essencialmente, os espaços de nome não são nada mais do que contêineres de métodos

*/

class base_class
{
var $var1;
function base_class ($value)
{
$this->var1 = $value;
}
function calc_pow ($base, $exp)
{
return pow ($base, $exp);
}
}
echo base_class::calc_pow (3, 4);

//81

/* 
No exemplo anterior, o operador :: pode ser usado para endereçar estaticamente
um dos métodos de uma classe e executá-lo. Agrupando um certo número de métodos
em uma classe e, em seguida, usar essa classe como um namespace pode tornar mais fácil evitar a nomenclatura
conflitos em sua biblioteca, mas, de modo geral, isso não é razão suficiente por si só para justificar a sobrecarga causada pelo uso de classes.

OBEJOS E SUAS REFERENCIAS

O maior problema de trabalhar com objetos é transferi-los para chamadas de função.
é porque os objetos se comportam exatamente da mesma maneira que todos os outros tipos de dados: Por padrão,
eles são passados ​​por valor. Ao contrário da maioria dos outros valores, no entanto, você quase sempre causará
um objeto a ser modificado quando você o usa.
*/

class my_class
{
var $my_var;
function my_class ($var)
{
global $obj_instance;

$obj_instance = $this;
$this->my_var = $var;
}
}
$obj = new my_class ('something ');
echo $obj->my_var;
echo $obj_instance->my_var;

/* 
Como você pode ver, o construtor aqui atribui o valor de $this à variável global
$obj_instance. Quando o valor de $ obj_instance-> my_var é impresso posteriormente no
script, no entanto, o esperado algo não aparece - e a propriedade realmente tem
um valor de NULL.
Para entender por quê, você precisa considerar duas coisas. Primeiro, quando $this é atribuído a
$ obj_instance, é atribuído por valor, e isso faz com que o PHP realmente crie uma cópia de
o objeto de forma que quando $ var for atribuído a $ this-> my_var, não haja mais nenhuma conexão entre o objeto atual e o que está armazenado em $ obj_instance.
Você pode pensar que atribuir $ this por referência pode fazer a diferença
*/

class my_class
{
var $my_var;
function my_class ($var)
{
global $obj_instance;
$obj_instance = &$this;
$this->my_var = $var;
}
}
$obj = new my_class (“something”);
echo $obj->my_var;
echo $obj_instance->my_var;

/* Infelizmente você vai achar isso muito ou mais estranho =] */

class my_class
{
var $my_var;
function my_class ($var)
{
global $obj_instance;
$obj_instance[] = &$this;
$this->my_var = $var;
}
}
$obj = new my_class (“something”);
echo $obj->my_var;
echo $obj_instance[0]->my_var;

/* 
Atribuir uma referência a $this a uma variável escalar não ajudou, mas fazendo
$obj_instance um array, a referência foi passada corretamente. O problema aqui é
que a variável $this é realmente uma variável especial construída ad hoc para o uso interno do
classe - e você realmente não deve confiar que ela seja usada para qualquer coisa externa.
Mesmo que esta solução pareça funcionar, aliás, ela realmente não funcionou. Experimente isto
*/

class my_class
{
var $my_var;
function my_class ($var)
{
global $obj_instance;
$obj_instance[] = &$this;
$this->my_var = $var;
}
}
$obj = new my_class (“something”);
$obj->my_var = “nothing”;
echo $obj->my_var;
echo $obj_instance[0]->my_var;

/* 
Se $obj_instance tivesse realmente se tornado uma referência para $ obj, esperaríamos uma mudança para
o último deve ser refletido também no primeiro. No entanto, como você pode ver se executar o script anterior, depois de alterarmos o valor de $ obj-> my_var para nada,
$ obj_instance ainda contém o valor antigo.
Como isso é possível? Bem, o problema está no fato de que $obj foi criado com um
tarefa simples. Então o que realmente aconteceu é que novo criou uma nova instância de
my_class, e uma referência a essa instância foi atribuída a $ obj_instance pelo construtor. Quando a instância foi atribuída a $ obj, no entanto, ela foi atribuída por valor—
portanto, uma cópia foi criada, levando às duas variáveis ​​contendo duas cópias distintas de
o mesmo objeto. Para obter o efeito que procuramos, temos que mudar
a atribuição para que também seja feita por referência;
*/
class my_class
{
var $my_var;
function my_class ($var)
{
global $obj_instance;
$obj_instance[] = &$this;
$this->my_var = $var;
}
}
$obj = new my_class (“something”);
$obj->my_var = “nothing”;
echo $obj->my_var;
echo $obj_instance[0]->my_var;

/* Agora, finalmente, $obj_instance é uma referência apropriada para $obj.
De modo geral, essa é a maior dificuldade que o usuário de objetos em PHP enfrenta.
Porque eles são tratados como valores escalares normais, você deve atribuí-los por referência
sempre que você os passa para uma função ou os atribui a uma variável */