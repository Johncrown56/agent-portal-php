<?php include_once('header.php'); ?>

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
  <div class="container space-3">
    <div class="row">
      <div class="col-lg-2" id="toolboxAccordion">

      <?php include_once('menu.php'); ?>

      <div>
       <?php include_once('toolbox.php'); ?>
      </div>

      </div>
      

      <div class="col-lg-1">
      </div>
      <div class="col-lg-6">
        <div class="mb-8">
          <!-- Nav -->
          <div class="text-center">
            <ul class="nav nav-segment nav-pills scrollbar-horizontal mb-7" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-one-code-features-example1-tab" data-toggle="pill" href="#pills-one-code-features-example1" role="tab" aria-controls="pills-one-code-features-example1" aria-selected="true">QA Announcement</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-two-code-features-example1-tab" data-toggle="pill" href="#pills-two-code-features-example1" role="tab" aria-controls="pills-two-code-features-example1" aria-selected="false">What's New</a>
              </li>
            </ul>
          </div>
          <!-- End Nav -->

          <!-- Tab Content -->
          <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-one-code-features-example1" role="tabpanel" aria-labelledby="pills-one-code-features-example1-tab">

              <!-- Articles Section -->
              <div class="container">
                <?php
                $api = 'article/announcement';
                $method = 'GET';
                $params = array(
                  '$level' => 0,
                );
                $result = CallAPI($method, $api, $params);
                if (count($result->article) > 0 || !empty($result->article)) {
                ?>
                  <div class="row">
                    <?php
                    foreach ($result->article as $key => $value) {
                      $name = $value->name;
                    ?>
                      <div class="col-lg-12 mb-3 mb-lg-3">
                        <!-- Card -->
                        <article class="card card-bordered h-100">
                          <div class="w-sm-100 p-4">
                            <h6 class="font-weight-bold font-size-50 text-dark"><?php echo $value->name; ?></h6>
                            <hr class="my-0 border-top">
                            <div class="mb-4">
                              <p class="font-weight-bold text-dark font-size-1"><?php echo $value->description; ?>...</p>
                            </div>
                            <div class="row">
                              <div class="col-lg-8">
                                <ul class="list-inline font-size-1 mt-3">
                                  <li class="list-inline-item text-dark">
                                    <i class="far fa-clock text-dark mr-1"></i><?php echo date("M. d, Y.", strtotime($value->createdDate)); ?>
                                  </li>
                                  <li class="list-inline-item text-dark">
                                    <i class="far fa-eye text-dark mr-1"></i> 801 views
                                  </li>
                                  <li class="list-inline-item text-dark">
                                    <i class="fas fa-thumbs-up text-dark mr-1"></i>675
                                  </li>
                                </ul>
                              </div>
                              <div class="col-lg-4 mt-2">
                                <a class="btn btn-xs btn-soft-primary border-radius-60 transition-3d-hover float-right" href="#">
                                  <i class="fas fa-angle-right font-size-1"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        </article>
                        <!-- End Card -->
                      </div>
                    <?php } ?>

                  </div>
                <?php } else { ?>
                  <div>
                    <p class="text-dark text-center">No articles available</p>
                  </div>
                <?php } ?>
              </div>
              <!-- End Articles Section -->
            </div>

            <div class="tab-pane fade" id="pills-two-code-features-example1" role="tabpanel" aria-labelledby="pills-two-code-features-example1-tab">
              <!-- Articles Section -->
              <div class="container">
                <?php
                $api = 'usefulitems/folder/1003';
                $method = 'GET';
                $params = array(
                  '$level' => 0
                );
                $result = CallAPI($method, $api, $params);
                //var_dump($result);
                if (count($result->folder[0]->article) > 0 || !empty($result->folder[0]->article)) {
                ?>
                  <div class="row">
                    <?php
                    foreach ($result->folder[0]->article as $key => $value) {
                      $name = $value->name;
                    ?>
                      <div class="col-lg-12 mb-3 mb-lg-3">
                        <!-- Card -->
                        <article class="card card-bordered h-100">
                          <div class="w-sm-100 p-4">
                            <h6 class="font-weight-bold font-size-50 text-dark"><?php echo $value->name; ?></h6>
                            <hr class="my-0 border-top">
                            <div class="mb-4">
                              <p class="font-weight-bold text-dark font-size-1"><?php echo $value->description; ?>...</p>
                            </div>
                            <div class="row">
                              <div class="col-lg-8">
                                <ul class="list-inline font-size-1 mt-3">
                                  <li class="list-inline-item text-dark">
                                    <i class="far fa-clock text-dark mr-1"></i><?php echo date("M. d, Y.", strtotime($value->createdDate)); ?>
                                  </li>
                                  <li class="list-inline-item text-dark">
                                    <i class="far fa-eye text-dark mr-1"></i> 801 views
                                  </li>
                                  <li class="list-inline-item text-dark">
                                    <i class="fas fa-thumbs-up text-dark mr-1"></i>675
                                  </li>
                                </ul>
                              </div>
                              <div class="col-lg-4 mt-2">
                                <a class="btn btn-xs btn-soft-primary border-radius-60 transition-3d-hover float-right" href="#">
                                  <i class="fas fa-angle-right font-size-1"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        </article>
                        <!-- End Card -->
                      </div>
                    <?php } ?>
                  </div>
                <?php } else { ?>
                  <div class="text-center">
                    <p class="text-dark">No articles available</p>
                  </div>
                <?php } ?>
              </div>
              <!-- End Articles Section -->
            </div>
          </div>
          <!-- End Tab Content -->
        </div>

        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>
      </div>
        <!-- Trending Section -->

    <div id="stickyBlockStartPoint" class="col-md-5 col-lg-3 mb-7 mb-md-0">
      <div class="js-sticky-block card card-bordered p-4 bg-success"
           data-hs-sticky-block-options='{
             "parentSelector": "#stickyBlockStartPoint",
             "breakpoint": "md",
             "startPoint": "#stickyBlockStartPoint",
             "endPoint": "#stickyBlockEndPoint",
             "stickyOffsetTop": 12,
             "stickyOffsetBottom": 12
           }'>
        <div class="text-center">
          <!-- User Content -->
          <img class="img-fluid rounded-circle mx-auto" src="../assets/img/160x160/img2.jpg" alt="Image Description" width="120" height="120">

          <span class="d-block text-body font-size-1 mt-3">Joined in 2017</span>

          <div class="mt-3">
            <a class="btn btn-sm btn-outline-primary transition-3d-hover" href="#">
              <i class="far fa-envelope mr-2"></i>
              Send Message
            </a>
          </div>
          <!-- End User Content -->
        </div>

        <div class="border-top pt-4 mt-4">
          <div class="row">
            <div class="col-6 col-md-12 col-lg-6 mb-4">
              <!-- Icon Block -->
              <div class="media">
                <div class="d-flex">
                  <span class="avatar avatar-xs mr-3">
                    <img class="avatar-img" src="../assets/svg/illustrations/review-rating-shield.svg" alt="Image Description">
                  </span>
                  <span class="text-body font-size-1 mt-1">533 Reviews</span>
                </div>
              </div>
              <!-- End Icon Block -->
            </div>

            <div class="col-6 col-md-12 col-lg-6 mb-4">
              <!-- Icon Block -->
              <div class="d-flex">
                <span class="avatar avatar-xs mr-3">
                  <img class="avatar-img" src="../assets/svg/illustrations/star.svg" alt="Image Description">
                </span>
                <span class="text-body font-size-1 mt-1">4.87 rating</span>
              </div>
              <!-- End Icon Block -->
            </div>

            <div class="col-6 col-md-12 col-lg-6 mb-4 col-6 col-md-12 mb-lg-0">
              <!-- Icon Block -->
              <div class="d-flex">
                <span class="avatar avatar-xs mr-3">
                  <img class="avatar-img" src="../assets/svg/illustrations/medal.svg" alt="Image Description">
                </span>
                <span class="text-body font-size-1 mt-1">Top teacher</span>
              </div>
              <!-- End Icon Block -->
            </div>

            <div class="col-6 col-md-12 col-lg-6">
              <!-- Icon Block -->
              <div class="d-flex">
                <span class="avatar avatar-xs mr-3">
                  <img class="avatar-img" src="../assets/svg/illustrations/add-file.svg" alt="Image Description">
                </span>
                <span class="text-body font-size-1 mt-1">29 courses</span>
              </div>
              <!-- End Icon Block -->
            </div>
          </div>
        </div>

        <div class="border-top pt-4 mt-4">
          <h1 class="h4 mb-4">Connected accounts</h1>

          <div class="row">
            <div class="col-6 col-md-12 col-lg-6 mb-4">
              <!-- Social Profiles -->
              <a class="media" href="#">
                <div class="icon icon-xs icon-soft-secondary mr-3">
                  <i class="fab fa-github"></i>
                </div>
                <div class="media-body">
                  <span class="d-block font-size-1 font-weight-bold">Behance</span>
                  <small class="d-block text-body">1.2k followers</small>
                </div>
              </a>
              <!-- End Social Profiles -->
            </div>

            <div class="col-6 col-md-12 col-lg-6 mb-4">
              <!-- Social Profiles -->
              <a class="media" href="#">
                <div class="icon icon-xs icon-soft-secondary mr-3">
                  <i class="fab fa-slack"></i>
                </div>
                <div class="media-body">
                  <span class="d-block font-size-1 font-weight-bold">Slack</span>
                  <small class="d-block text-body">4.5k followers</small>
                </div>
              </a>
              <!-- End Social Profiles -->
            </div>

            <div class="col-6 col-md-12 col-lg-6 mb-0 mb-md-4 mb-lg-0">
              <!-- Social Profiles -->
              <a class="media" href="#">
                <div class="icon icon-xs icon-soft-secondary mr-3">
                  <i class="fab fa-twitter"></i>
                </div>
                <div class="media-body">
                  <span class="d-block font-size-1 font-weight-bold">Twitter</span>
                  <small class="d-block text-body">2.7k followers</small>
                </div>
              </a>
              <!-- End Social Profiles -->
            </div>

            <div class="col-6 col-md-12 col-lg-6">
              <!-- Social Profiles -->
              <a class="media" href="#">
                <div class="icon icon-xs icon-soft-secondary mr-3">
                  <i class="fab fa-facebook-f"></i>
                </div>
                <div class="media-body">
                  <span class="d-block font-size-1 font-weight-bold">Facebook</span>
                  <small class="d-block text-body">3k followers</small>
                </div>
              </a>
              <!-- End Social Profiles -->
            </div>
          </div>
        </div>

        <div class="border-top text-center pt-4 mt-4">
          <a class="text-body small" href="#">
            <i class="far fa-flag mr-1"></i> Report this author
          </a>
        </div>
      </div>
    </div> 

<!-- End Trending Section -->      
    </div>
  </div>
  </main>
  <!-- ========== END MAIN CONTENT ========== -->


<?php include_once('footer.php');?>