<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        $template = new Template();
        echo $template->getCss('bootstrap.min', 'all');  
        echo $template->getCss('font-awesome.min', 'all');
        echo $template->getCss('theme', 'all');
        echo $template->getJS('jquery-2.1.1.min');
        echo $template->getJS('bootstrap.min');
        echo $template->getJS('script20160430');
        echo $template->getJS('app');
    ?>
    <title>DEV DAY 2016</title>

    <style>
        .backg, .modalinfo {-webkit-transition: 0s ease-out; -moz-transition: 0s ease-out; -o-transition: 0s ease-out; transition: 0s ease-out;}
        .fechar {float:right; position: absolute; right:0px; top:-54px; background:#825F35 !important; color:#fff; padding: 10px; cursor:pointer;}
        .conteudo .fa {margin-top:25px;}
    </style>
</head>
<body>