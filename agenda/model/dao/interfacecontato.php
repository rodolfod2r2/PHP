<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/01/2018
 * Time: 12:23
 */

namespace app\model\dao;


interface InterfaceContato {

    public function criarForm();

    public function criarListagem();

    public function salvar();

    public function atualizar($Id);

    public function remover($Id);

    public function exibirDetalhe($Id);

}