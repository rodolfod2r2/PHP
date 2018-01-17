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



Editando...
