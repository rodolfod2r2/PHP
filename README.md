# PHP

Exemplos de Códigos em PHP;

1. SINTAXE BÁSICA

> DELIMITADORES PHP:

    <?php ?> ou <? ?>  -> short-tags.
    
> SEPARADOR DE INSTRUÇÕES:

    ; Ponto e vírgula, indica ao sistema fim de instrução.
    
> NOMES DE VARIÁVEIS:

Precedidas pelo `$` e uma string; Exemplo: `$nome`, `$nomeAluno`. 

**OBS**: PHP é case sensitive, ou seja, as variáveis `$php` e `$PHP` são diferentes.

> COMENTÁRIOS: 

**Comentários de uma linha**: Pode ser delimitado pelo caracter `#` ou por duas barras `//`, Exemplo: `#comentário` ou `//comentário`
**Comentários de mais de uma linha**: Possui os delimitadores `/*` para o início do bloco e `*/` para o final do comentário.

2. ESTRUTURA DE CONTROLE

> BLOCOS

Um bloco consiste de vários comandos agrupados com o objetivo de relacioná-los com
determinado comando ou função.

> CONDICIONAL IF / ELSEIF / ELSE

Permitem executar comandos ou blocos de comandos com base em testes feitos durante a execução.
    
###### EXEMPLOS ######

```
    if (expressão) comando;
----
    if (expressão){
        comando;
        comando;
    }
----
    if (expressão):
        comando;
    endif;
----    
     if (expressão) comando;
     elseif (expressão) comando;
     else comando;
----    
    if (expressão){
        comando;
    } elseif (expressão) {
        comando;
    } else {
        comando;
    }
----
    if (expressão):
        comando;
    elseif (expressão):
        comando;
    else:
        comando;
    endif;
```

> CONDICIONAL SWITCH - CASE

Recebendo uma expressão como parâmetro e em seguida são feitas verificações para saber se ela corresponde a algum dos valores especificados, dentro do switch também é possível especificar um trecho de código que deve ser executado no caso de nenhuma das condições ser atendida. Para esse caso temos o comando default.

***OBS***:  break finaliza a execução da estrutura for, foreach, while, do-while ou switch atual.
    
###### EXEMPLOS ######

```
    switch ($var) {
    	case 0: comando; break;
    	case 1: comando; break;
    	case 2: comando; break;
    	default: comando; break;
    }
```

> REPETIÇÃO WHILE - DO WHILE - FOR - FOREACH

***WHILE***: é o comando de repetição (laço) mais simples. Ele testa uma condição e executa um comando, ou um bloco de comandos, até que a condição testada seja falsa.

***DO WHILE***: semelhante ao while, com a simples diferença que a expressão é testada ao final do bloco de comandos.

***FOR***: A primeira expressão (inicialização) é avaliada (executada), uma vez, incondicionalmente, no início do laço. No começo de cada iteração a condição é avaliada. Se a avaliada como `TRUE`, o laço continuará e as instruções aninhada serão executadas. Se avaliada como `FALSE`, a execução do laço terminará.

***FOREACH***: Fornece uma maneira fácil de iterar sobre arrays. O foreach funciona somente em arrays e objetos;

***OBS***:  A cada iteração, o valor do elemento atual é atribuído a $value e o ponteiro interno do array avança uma posição.

***OBS***:  Atribuir a chave do elemento corrente a variável $key a cada iteração.


###### EXEMPLOS ######

```
while (expressão) comando;
----
    while (expressão){
        comando;
        comando;
    }
----
    while (expressão):
        comando;
    endwhile;
----    
    do {
		comando;
    } while (expressão);
----    
    for (<inicialização>;<condição>;<incremento ou decremento>)comando;
----
    for (<inicialização>;<condição>;<incremento ou decremento>){
		comando;
	}
----
    for (<inicialização>;<condição>;<incremento ou decremento>):
		comando;
	endfor;
----
    foreach (array_expression as $value){
    	comando;
    }
----
    foreach (array_expression as $key => $value){
    	comando;
    }
----
    foreach (array_expression as $value):
        comando;
    endforeach;
----
    foreach (array_expression as $key => $value):
        comando;
    endforeach;
```








editando...
