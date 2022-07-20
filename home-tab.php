<div class="tab-content">
  <div class="tab-pane fade show active" id="new-articles" role="tabpanel" aria-labelledby="new-articles-tab">
    <!-- Articles Section -->
    <div class="container">
      <?php
      $api2 = 'usefulitems/folder/1003';
      $method2 = 'GET';
      $params2 = array(
        '$level' => 0
      );
      $result2 = CallAPI($method2, $api2, $params2);
      //var_dump($result);
      if (count($result2->folder[0]->article) > 0 || !empty($result2->folder[0]->article)) {
      ?>
        <div class="row">
          <?php
          foreach ($result2->folder[0]->article as $key2 => $value2) {
            $name2 = $value2->name;
          ?>
            <div class="col-lg-12 mb-3 mb-lg-3">
              <!-- Card -->
              <article class="card card-bordered h-100">
                <div class="w-sm-100 p-4">
                  <a class="text-dark" href="<?php echo $articleDir . '/' . $value2->id . '/' . clean_and_hyphenate($value2->name); ?>">
                    <span class="font-weight-bold font-size-50 text-dark"><?php echo $value2->name; ?></span>
                  </a>
                  <hr class="my-0 border-top">
                  <div class="mb-4">
                    <p class="font-weight-bold text-dark font-size-1"><?php echo $value2->description; ?>...</p>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                      <ul class="list-inline font-size-1 mt-3">
                        <li class="list-inline-item text-dark">
                          <i class="far fa-clock text-dark mr-1"></i><?php echo date("M. d, Y.", strtotime($value2->createdDate)); ?>
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
                      <a class="btn btn-xs btn-soft-primary border-radius-60 transition-3d-hover float-right" href="<?php echo $articleDir . '/' . $value2->id . '/' . clean_and_hyphenate($value2->name); ?>">
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
          <p class="text-dark">No new articles available</p>
        </div>
      <?php } ?>
    </div>
    <!-- End Articles Section -->
  </div>


  <div class="tab-pane fade" id="updated-articles" role="tabpanel" aria-labelledby="updated-articles-tab">

    <!-- Articles Section -->
    <div class="container">
      <?php
      $api = 'usefulitems/folder/1004';
      $method = 'GET';
      $params = array(
        '$level' => 0,
      );
      $result = CallAPI($method, $api, $params);
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
                  <a class="text-dark" href="<?php echo $articleDir . '/' . $value->id . '/' . clean_and_hyphenate($value->name); ?>">
                    <span class="font-weight-bold font-size-50 text-dark"><?php echo $value->name; ?></span>
                  </a>
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
                      <a class="btn btn-xs btn-soft-primary border-radius-60 transition-3d-hover float-right" href="<?php echo $articleDir . '/' . $value->id . '/' . clean_and_hyphenate($value->name); ?>">
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
          <p class="text-dark text-center">No updated articles available</p>
        </div>
      <?php } ?>
    </div>
    <!-- End Articles Section -->
  </div>


</div>