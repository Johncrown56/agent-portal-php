<?php include_once('header.php'); 
include_once('aside.php');
?>

  <main id="content" role="main" class="main splitted-content-main">
    <!-- Fluid Content -->
    <div class="splitted-content-fluid content-space mt-9 ml-3">
      <!-- Toggles -->
      <div class="d-flex justify-content-end">
        <ul class="list-inline">
          <li class="list-inline-item">
            <!-- Small Content Toggle -->
            <a class="js-hs-unfold-invoker splitted-content-toggle btn btn-icon btn-sm btn-ghost-secondary" href="javascript:;" data-toggle="tooltip" data-placement="right" title="Secondary sidebar"
               data-hs-unfold-options='{
                "target": "#splittedContentSmall",
                "type": "css-animation",
                "animationIn": "fadeInLeft",
                "animationOut": "fadeOutLeft",
                "hasOverlay": true,
                "smartPositionOff": true
               }'>
              <i class="tio-format-points"></i>
            </a>
            <!-- End Small Content Toggle -->
          </li>

          <li class="list-inline-item">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-sm btn-ghost-secondary">
              <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip" data-placement="right" title="Collapse"></i>
              <i class="tio-last-page navbar-vertical-aside-toggle-full-align" data-toggle="tooltip" data-placement="right" title="Expand"></i>
            </button>
            <!-- End Navbar Vertical Toggle -->
          </li>
        </ul>
      </div>
      <!-- End Toggles -->

      <div class="">
      <?php include_once('files.php');?>
      </div>


      
    </div>
    <!-- End Fluid Content -->


  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->

  <?php include_once('footer.php');?>