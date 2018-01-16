<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 16/01/2018
 * Time: 00:53
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
            margin: 0;
            padding: 0;
        }
        .mtop{
            margin-top: 75px;
            text-align: center;
            margin-bottom: 75px;
        }
        .thumb-post img {
            object-fit: none; /* Do not scale the image */
            object-position: center; /* Center the image within the element */
            width: 100%;
            max-height: 250px;
            margin-bottom: 0.5rem;
        }
        .full-width-image {
            position: relative;
            text-align: center;
        }
        .thumb-image {
            position: absolute;
            bottom: -70px;
            left: 10%;
            max-height: 140px;
            height: 140px;
            max-width: 140px;
            width: 140px;
            border-radius: 50%;
            z-index: 2;
            border: solid 4px #ffffff;
        }
        .thumb-title {
            z-index: 1;
            position: absolute;
            bottom: -25px;
            left: 10%;
            max-height: 50px;
            height: 50px;
            max-width: 640px;
            width: 640px;
            line-height: 50px;
            text-align: left;
            padding-left: 160px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
            border-radius: 25px;
            background-color: #ffffff;
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
<div class="container">
    <div class="row">
        <?php $services->loadHeader($services->channelID(), $services->playlistItemsURI($_REQUEST['playlistid'])); ?>
    </div>
    <div class="row">
        <?php $services->loadListItemChannelDetails($services->playlistItemsURIMAX($_REQUEST['playlistid'])); ?>
    </div>
</div>
</body>
</html>


