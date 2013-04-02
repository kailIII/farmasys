<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $titulo; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url();?>css/main.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/normalize.css">

        <script src="<?php echo base_url();?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
        	<header class="wrapper clearfix">
                <h1 class="title">farmaSYS</h1>
                <nav>
                    <ul>
						<li><a href="<?php echo base_url();?>">Inicio</a></li>
						<li><a href="<?php echo base_url();?>index.php/producto/producto">Nuevo</a></li>
						<li><a href="<?php echo base_url();?>index.php/producto/producto/buscador">Anadir</a></li>
						<li><a href="<?php echo base_url();?>index.php/producto/producto/stock">Stock</a></li>
						<li><a href="<?php echo base_url();?>index.php/shop/shop">Venta</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
        	<div class="main wrapper clearfix">
