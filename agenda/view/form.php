<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/01/2018
 * Time: 14:00
 */

include_once ('autoload.php');
$contato = new \app\controller\Contato();

?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <h3>Agenda de Contatos <div class="pull-right"><a href="list.php"> Voltar </a></div></h3>
    <hr/>
    <form class="form-inline" action="dispatcher.php" method="post">
        <?php $contato->criarForm() ?>
    </form>
</div>
</body>
</html>