  <!-- Navbar Vertical -->
  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <div class="navbar-brand-wrapper justify-content-between">
          <!-- Navbar Vertical Toggle -->
          <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
            <i class="tio-clear tio-lg"></i>
          </button>
          <!-- End Navbar Vertical Toggle -->
        </div>

        <!-- Content -->
        <div class="navbar-vertical-content">
        <div>
       <?php include_once('menu.php'); ?>
      </div>

        
        </div>
        <!-- End Content -->

        <!-- Footer -->
        <div class="navbar-vertical-footer pl-2 no-border">
        <div>
        <?php //echo 'this is the article ID '. $_GET['aid']; ?>
       <?php include_once('toolbox.php'); ?>
      </div>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </aside>
  <!-- End Navbar Vertical -->