<?php ob_start(); ?>
<?php include_once('header.php');
$json = file_get_contents('./assets/json/home-box.json');
// Converts it into a PHP object
$data = json_decode($json, true);


?>

<!-- ========== MAIN ========== -->
<!-- <main id="content" role="main">
  <div class="bg-dark" style="height: 45px;"></div>
  </main> -->
<main id="content" role="main">
  <!-- Hero Section -->
  <div class="position-relative bg-primary overflow-hidden">
    <div class="container position-relative space-top-3 space-top-md-4 space-bottom-3" style="background-image: url('./assets/images/bg/young-girl-hd1.png'); background-repeat: no-repeat; background-position: center;
     background-size: cover;">
      <div>


        <div class="row">
          <div class="col-lg-2 col-sm-12 margin-top-minus-45 header-fix-top z-index-999">
            <?php include_once('menu.php'); ?>
          </div>

          <div class="col-lg-9 col-sm-12 offset-3">
            <div class="w-md-80 w-xl-80 text-center mx-md-0 mb-4">
              <div class="mb-2">
                <h1 class="display-5 text-dark mb-4">Welcome to CR <span class="font-italic">HIP</span> Portal</h1>
              </div>

              <?php include_once('search-component.php'); ?>
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- SVG Shapes -->

    <figure class="position-absolute right-0 bottom-0 left-0 mb-n1">
      <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
        <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z" />
      </svg>
    </figure>
    <!-- End SVG Shapes -->
  </div>
  <!-- End Hero Section -->

  <!-- Clients Section -->
  <div class="" style="margin-top: -5rem;">
    <div class="container space-1 space-top-md-0">
      <div class="mx-lg-auto">
        <div class="text-center justify-content-center ml-10">
          <div class="mtn-btn-group__floating">
            <div class="mtn-btn-group__2-col">
              <button id="" onclick="window.open('experience-center', '_self')" type="default" class="mtn-btn mtn-btn--text-left-icon mtn-btn--skin-white mtn-btn--square-icon-desktop mr-8">
                <img src="./assets/svg/mtn/experience-centre.svg" class="w-100">
                <span class="btn-text font-weight-bolder btn-top">My Experience <br> Center</span>
              </button>

              <button id="" onclick="window.open('mtn-academy', '_self')" type="default" class="mtn-btn mtn-btn--text-left-icon mtn-btn--skin-white mtn-btn--square-icon-desktop mr-8">
                <img src="./assets/svg/mtn/graduation-cap.svg" class="w-100">
                <span class="btn-text font-weight-bolder btn-top">MTN <br> Academy</span>
              </button>

              <?php
              $topicApi = 'topic';
              $topicMethod = 'GET';
              $topicParams = array(
                '$rangestart' => 8,
                '$rangesize' => 2
              );
              $secTierTopicsResult = CallAPI($topicMethod, $topicApi, $topicParams);
              $count = 0;
              if (count($secTierTopicsResult->topicTree) > 0 || !empty($secTierTopicsResult->topicTree)) {
                foreach ($secTierTopicsResult->topicTree as $key => $values) {
                  $count = ++$count;
                  if ($count == 2) {
                    $len = 11;
                  } else {
                    $len = 4;
                  }
                  // foreach ($data as $key => $values) {
                  // $id = $values['id'];
                  // $img = $values['img'];
                  // $text = $values['text'];
                  // $url = $values['url'];
              ?>
                  <button id="" onclick="window.open('./topic/<?php echo $values->topic->id; ?>','_self')" type="default" class="mtn-btn mtn-btn--text-left-icon mtn-btn--skin-white mtn-btn--square-icon-desktop mr-8">
                    <!-- <i class="mtn-icon mtn-icon-mymtn text-c-yellow btn-icon"></i> -->
                    <img src="<?php echo $values->topic->imageUrl; ?>" alt="<?php echo $values->topic->name . ' ' . $count . ' ' . $len; ?> " class="w-100" style="height: 50px;">
                    <span class="btn-text font-weight-bolder btn-top"><?php echo wordwrap($values->topic->name, $len, "<br />\n");  ?></span>
                  </button>
              <?php }
              } ?>

              <button id="" onclick="window.open('guided-help','_blank')" type="default" class="mtn-btn mtn-btn--text-left-icon mtn-btn--skin-white mtn-btn--square-icon-desktop mr-8">
                <img src="./assets/svg/mtn/mtnboticon.png" class="w-100">
                <span class="btn-text font-weight-bolder btn-top">Guided <br> Help </span>
              </button>

              <?php
              $api = 'topic';
              $method = 'GET';
              $params = array(
                '$rangestart' => 10,
                '$rangesize' => 1
              );
              $secTierTopicsResult2 = CallAPI($method, $api, $params);
              $count = 0;
              if (count($secTierTopicsResult2->topicTree) > 0 || !empty($secTierTopicsResult2->topicTree)) {
                foreach ($secTierTopicsResult2->topicTree as $key => $values) {
                  $count = ++$count;
              ?>
                  <button id="" onclick="window.open('./topic/<?php echo $values->topic->id; ?>','_self')" type="default" class="mtn-btn mtn-btn--text-left-icon mtn-btn--skin-white mtn-btn--square-icon-desktop mr-8">
                    <img src="<?php echo $values->topic->imageUrl; ?>" alt="<?php echo $values->topic->name . ' ' . $len; ?> " class="w-100" style="height: 50px;">
                    <span class="btn-text font-weight-bolder btn-top"><?php echo wordwrap($values->topic->name, 7, "<br />\n");  ?></span>
                  </button>
              <?php }
              } ?>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- End Clients Section -->
  <!-- Description Section -->
  <div class="container space-2">
    <div class="row">
      <div class="col-lg-2 z-index-2" id="toolboxAccordion">

        <?php include_once('toolbox.php'); ?>

      </div>

      <div class="col-lg-1">
      </div>
      <div class="col-lg-6">
        <div class="mb-8">
          <!-- Nav -->
          <div class="text-center">
            <ul class="nav nav-segment nav-pills scrollbar-horizontal mb-7" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="new-articles-tab" data-toggle="pill" href="#new-articles" role="tab" aria-controls="new-articles" aria-selected="false">What's New</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="updated-articles-tab" data-toggle="pill" href="#updated-articles" role="tab" aria-controls="updated-articles" aria-selected="true">What's Changed</a>
              </li>

            </ul>
          </div>
          <!-- End Nav -->

          <!-- Tab Content -->
          <?php include_once('home-tab.php'); ?>
          <!-- End Tab Content -->
        </div>

        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>
      </div>

      <div class="col-lg-3">
        <?php include_once('trending.php'); ?>
      </div>
    </div>
  </div>
  <!-- Description Section -->


</main>
<!-- ========== END MAIN ========== -->

<?php include_once('footer.php'); ?>