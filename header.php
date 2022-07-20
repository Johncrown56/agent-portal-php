<?php include_once('variables.php');
//$_SERVER['SERVER_NAME']; or $_SERVER['HTTP_HOST'] for base href 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="https://getit.mtnonline.com/agent/" />
  <!-- Title -->
  <title>MTN AGENT PORTAL</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="./assets/images/favicon/icon_favicon.ico">

  <!-- Font -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> -->

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/fontawesome/css/all.min.css">
  <!-- <link rel="stylesheet" href="./assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css"> -->
  <link rel="stylesheet" href="./assets/vendor/aos/dist/aos.css">

  <link rel="stylesheet" href="./assets/vendor/dzsparallaxer/dzsparallaxer.css">
  <link rel="stylesheet" href="./assets/vendor/cubeportfolio/css/cubeportfolio.min.css">
  <link rel="stylesheet" href="./assets/vendor/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="./assets/vendor/quill/dist/quill.snow.css">
  <link rel="stylesheet" href="./assets/vendor/@fancyapps/fancybox/dist/jquery.fancybox.min.css">

  <!-- CSS Front Template -->

  <link rel="stylesheet" href="./assets/css/theme.css?<?php echo date('h-i-s'); ?>">
  <link rel="stylesheet" href="./assets/css/additional.css?<?php echo date('h-i-s'); ?>">
  <link rel="stylesheet" href="./assets/css/mtn-theme-style.min.css?<?php echo date('h-i-s'); ?>">
  <link rel="stylesheet" href="./assets/css/navbar.css?<?php echo date('h-i-s'); ?>">
  <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $siteKey;?>"></script>

</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl navbar-vertical-aside-closed-mode">
  <!-- ========== HEADER ========== -->
  <div id="overlay">
    <div class="cv-spinner">
      <span class="spinner"></span>
    </div>
  </div>
  <?php
  include_once('head1.php');
  ?>