<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/01/2018
 * Time: 12:23
 */

namespace app\controller;

class Contato implements IntefaceContato {

    public function criarForm() {
        $contato = new \app\model\dao\Contato();
        $contato->criarForm();
    }

    public function criarListagem() {
        $contato = new \app\model\dao\Contato();
        $contato->criarListagem();
    }

    public function salvar() {
        $contato = new \app\model\dao\Contato();
        $contato->salvar();
    }

    public function atualizar($Id) {
        $contato = new \app\model\dao\Contato();
        $contato->atualizar($Id);
    }

    public function remover($Id) {
        $contato = new \app\model\dao\Contato();
        $contato->remover($Id);
    }

    public function exibirDetalhe($Id) {
        $contato = new \app\model\dao\Contato();
        $contato->exibirDetalhe($Id);
    }

}