<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/01/2018
 * Time: 12:28
 */

namespace app\controller;


interface IntefaceContato {

    public function criarForm();

    public function criarListagem();

    public function salvar();

    public function atualizar($Id);

    public function remover($Id);

    public function exibirDetalhe($Id);

}