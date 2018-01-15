<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/01/2018
 * Time: 14:58
 */

include_once ('autoload.php');
$contato = new \app\controller\Contato();

if (isset($_POST['salvar'])) :
    $contato->salvar();
    header('location: list.php');
elseif (isset($_POST['editar'])):
    $contato->atualizar($_POST['id']);
   header('location: list.php');
else:
    return;
endif;
