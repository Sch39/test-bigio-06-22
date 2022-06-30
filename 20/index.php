<?php

session_start();
require_once 'connection.php';
?>

<html lang="en" class="no-js">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!--[if lt IE 9]> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
  <title>SMPN tgytgygyg</title>
  <meta name="description" content="">
  <meta name="author" content="DS">
  <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  <!--[if lte IE 8]>
		<script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
	<![endif]-->

</head>

<body>
  <header class="header">

    <div class="container">
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="#" class="navbar-brand scroll-top logo"><img src="assets/images/logo.png" alt="" style="margin-top:-10px;"> <b>Sistem Informasi Nilai Akademik</b></a>
        </div>
        <!--/.navbar-header-->
        <div id="main-nav" class="collapse navbar-collapse">
          <ul class="nav navbar-nav" id="mainNav">
            <li class="active"><a href="#home" class="scroll-link">Home</a></li>
            <li><a href="#profile" class="scroll-link">Tentang</a></li>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
              <li><a class="btn btn-primary" href="dashboard/" class="scroll-link">Beranda</a></li>
              <li><a href="logout.php" class="scroll-link">Keluar</a></li>
            <?php
            } else {
            ?>
              <li><a href="#profile" class="scroll-link">Masuk</a></li>
            <?php
            }
            ?>
          </ul>
        </div>
        <!--/.navbar-collapse-->
      </nav>
      <!--/.navbar-->
    </div>
    <!--/.container-->
  </header>
  <!--/.header-->
  <div id="#top"></div>
  <section id="home">
    <div class="banner-container">
      <img src="assets/images/b.jpg" alt="banner" />
      <div class="container banner-content">
        <div id="da-slider" class="da-slider">
          <div class="da-slide">
            <h2>Developed</h2>
            <p>Sukron Ch</p>
            <div class="da-img"></div>
          </div>
          <div class="da-slide">
            <h2>Sistem Informasi Management Nilai Siswa</h2>
            <p>SMP </p>
            <div class="da-img"></div>
          </div>
          <nav class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <!--/.container-->
  </section>
  <section id="profile" class="page-section" style="background:#222222;">
    <div class="container">
      <div class="heading text-center">
        <!-- Heading -->
        <h2><i class="fa fa-user color"></i> Tentang</h2>
        <center>
          <hr style="width:15%;">
        </center>
      </div>
      <div class="row">

        <?php
        if (!isset($_SESSION['access'])) {
        ?>
          <div class="col-md-6">
            <form role="form" action="core/login_proses.php" method="post">
              <div class="form-group">
                <h4 style="color:#999999;">username :</h4>
                <input type="text" class="form-control" placeholder="Enter username" name="username" required>
              </div>
              <div class="form-group">
                <h4 style="color:#999999;">Password :</h4>
                <input type="password" class="form-control" placeholder="Enter password" name="password" required>
              </div>
              <button type="submit" class="btn btn-warning btn-block" name="signin">Login</button>
            </form>
          </div>
        <?php
        }
        ?>
      </div>

    </div>
    <!--/.container-->
  </section>
  <footer>
    <div class="container">

    </div>
  </footer>
  <!--/.page-section-->
  <section class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 text-left">
          </a>
        </div>
        <div class="col-sm-6 text-right">

        </div>
      </div>
      <!-- / .row -->
    </div>
  </section>
  <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>



</body>

</html>