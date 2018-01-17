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

