<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo asset_url(); ?>css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo asset_url(); ?>css/style.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="<?php echo asset_url(); ?>js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript" src="<?php echo asset_url(); ?>js//materialize.min.js"></script>

      <script type="text/javascript">
        $("document").ready(function(){
          $(".dropdown-button").dropdown();
        })
      </script>

      <?php if(is_logedin()) { ?>
        <nav>
          <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Logo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="<?php echo base_url('provinsi') ?>">Provinsi</a></li>
              <li><a href="<?php echo base_url('kabupaten') ?>">Kabupaten</a></li>
              <?php if(is_admin()) { ?>
              <li><a href="<?php echo base_url('user') ?>">User</a></li>
              <?php }else{ ?>
              <li><a href="<?php echo base_url('user/edit')."/".current_id(); ?>">Edit Profile</a></li>
              <?php } ?>
              <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Report<i class="material-icons right">arrow_drop_down</i></a></li>
              <li><a href="auth/logout">Log Out</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="<?php echo base_url('provinsi') ?>">Provinsi</a></li>
              <li><a href="<?php echo base_url('kabupaten') ?>">Kabupaten</a></li>
              <?php if(is_admin()) { ?>
              <li><a href="<?php echo base_url('user') ?>">User</a></li>
              <?php } ?>
              <li><a href="auth/logout">Log Out</a></li>
            </ul>
          </div>
        </nav>

        <ul id="dropdown1" class="dropdown-content">
          <li><a href="<?php echo base_url('reports/provinsi'); ?>">Jumlah Penduduk Per Provinsi</a></li>
          <li><a href="<?php echo base_url('reports/kabupaten'); ?>">Jumlah Penduduk Per Kabupaten</a></li>
        </ul>
      <?php } ?>

