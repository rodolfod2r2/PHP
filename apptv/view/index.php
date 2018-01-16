<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 16/01/2018
 * Time: 00:43
 */

include_once ('autoload.php');
$services = new \apptv\service\DailyMotion();
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
<style type="text/css">
    html, body{
        background-color: #d9d9d9 !important;
    }
    .thumb-post {
        background-color: #ffffff !important;
        padding: 1rem;
        margin: 10px;
    }
    .thumb-post img {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        width: 100%;
        max-height: 250px;
        margin-bottom: 0.5rem;
    }
</style>
</head>

<body>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Daily  <span class="glyphicon glyphicon-play-circle"></span> TV</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Canais</h3>
        </div>
    </div>
    <div class="row">
        <?php $services->loadProgram($services->playlistURI()); ?>
    </div>
</div>
</body>
</html>


