<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="icon" type="image/x-icon" href="">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo base_url(); ?>assets/css/stylish-portfolio.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <title>Laboratorium Teknik Informatika - UMM</title>
    
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta property="og:title" content="Laboratorium Teknik Informatika - UMM"/>
    <meta property="og:type" content="article"/>
    <meta property="og:site_name" content="domain.com" />
    <meta property='og:description' content="Laboratorium Teknik Informatika - UMM is bla bla bla" />

    <meta property="og:url" content="http://domain.com/"/>
    <meta property="og:image" content="logo.jpg"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="setiawan dev">

  </head>

  <body>

    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
            <a class="navbar-brand" href="<?php echo base_url(); ?>">LAB - IT</a>
        </div>
        
        <div class="collapse navbar-collapse navbar-inverse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>#top">Home</a></li>
                <li><a href="<?php echo base_url(); ?>#about">About</a></li>
                <li><a href="<?php echo base_url(); ?>#services">Services</a></li>
                <li><a href="<?php echo base_url(); ?>#portfolio">Portfolio</a></li>
                <li><a href="<?php echo base_url(); ?>#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($status == "Login") { ?>
                    <li>
                        <a href="#loginPopup" id="myLogin"><?php echo $status; ?></a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="<?php echo base_url(); ?>login_user/logout" id="myLogout"><?php echo $status; ?></a>
                    </li>
                    <li>
                        <a href="#" id="myprofile"><?php echo $name; ?></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>fe_schedule" id="myschedule">Schedule</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        
    </nav>
    