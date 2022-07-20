<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>Unapproved Devices | Warning Page</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/images/favicon/favicon.ico">

  <!-- Font -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> -->

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/fontawesome/css/all.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="./assets/css/theme.css?<?php echo date('h-i-s');?>" width="45px" height="40px">
  <link rel="stylesheet" href="assets/css/mtn-theme-style.min.css?<?php echo date('h-i-s');?>">
</head>
<body>
  <!-- ========== HEADER ========== -->
  <header id="header" class="header header-bg-transparent header-abs-top py-3">
    <div class="header-section">
      <div id="logoAndNav" class="container">
        <nav class="navbar">
          <a class="navbar-brand" href="https://help.mtnonline.com/" aria-label="Front">
            <img src="./assets/svg/logos/mtn_logo.svg" alt="Logo">
          </a>

          <div class="ml-auto">
          <input id="textUrl" type="hidden" value="https://help.mtnonline.com/">
            <a class="js-clipboard btn btn-sm btn-primary transition-3d-hover" href="javascript:;"
       data-hs-clipboard-options='{
         "contentTarget": "#textUrl",
         "successText": "Copied!"
       }'>Copy link to clipboard</a>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="d-flex">
      <div class="container d-flex align-items-center vh-100">
        <div class="row justify-content-md-center flex-md-grow-1 text-center">
          <div class="col-md-9 col-lg-6">
            <img class="img-fluid mb-2" src="./assets/svg/illustrations/maintenance-mode.svg" alt="SVG Illustration">
            <h1 class="h2">This website is not optimized for mobile</h1>
            <p>We apologize for the inconvenience but this website is currently not available for mobile devices. 
                Please kindly view it via desktop or laptop.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Hero Section -->
  </main>
  <!-- ========== END MAIN ========== -->

  <!-- ========== FOOTER ========== -->
  <footer class="position-absolute right-0 bottom-0 left-0">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center space-1">
        <!-- Copyright -->
        <p class="small text-muted mb-0">Copyright &copy; Research & Digital Media <?php echo date('Y'); ?></p>
        <!-- End Copyright -->

        <!-- Social Networks -->
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-primary" href="https://www.facebook.com/MTNLoaded">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-primary" href="http://www.youtube.com/MTNNG">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-primary" href="https://twitter.com/MTNNG">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-primary" href="https://instagram.com/mtnng/">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
        <!-- End Social Networks -->
      </div>
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script src="./assets/vendor/clipboard/dist/clipboard.min.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>
  <script>
  $(document).on('ready', function () {
    // INITIALIZATION OF CLIPBOARD
    // =======================================================
    $('.js-clipboard').each(function() {
      var clipboard = $.HSCore.components.HSClipboard.init(this);
    });
  });
</script>

  <!-- IE Support -->
  <script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="./assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
  </script>
</body>
</html>