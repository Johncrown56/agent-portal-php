      <!-- Content -->
      <div class="content container-fluid">
          <!-- Page Header -->
          <div class="page-header">
              <div class="row align-items-end">
                  <div class="col-sm mb-2 mb-sm-0">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb breadcrumb-no-gutter">
                              <li class="breadcrumb-item"><a class="breadcrumb-link" href="./">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Guided Help</li>
                          </ol>
                      </nav>
                  </div>
              </div>
              <!-- End Row -->
          </div>
          <!-- End Page Header -->

          <!-- Header -->
          <div class="row align-items-center mb-2">
              <div class="col">
                  <h2 class="h4 mb-0">Agent Guided Help</h2>
              </div>
          </div>
          <!-- End Header -->
          <div id="alert_message"></div>

          <!-- Card -->
          <div class="card">
              <div class="card-header">
                  <h5 class="card-header-title">Question and Answer</h5>
              </div>
              <div class="card-body">
                  <?php
                    $ghApi = 'search/start';
                    $ghMethod = 'POST';
                    $ghParams = array(
                        'casebaseId' => 200101000000710
                    );
                    $guidedHelpResult = CallAPI($ghMethod, $ghApi, http_build_query($ghParams));
                    //var_dump($guidedHelpResult);
                    if ($guidedHelpResult->callInfo->status  == "success") {
                        $question = $guidedHelpResult->unansweredQuestion[0];
                        if (!empty($question->title)) {
                    ?>
                          <div class="nextQuestion">
                              <h6 class="card-title mb-3 "><i class="fas fa-question-circle"></i> <?php echo ' ' . $question->title ?></h6>
                          </div>
                          <div class="nextAnswer">
                              <?php
                                $count = 0;
                                foreach ($question->validAnswer as $ky => $vl) {
                                    $count = ++$count;
                                ?>

                                  <div class="form-group mb-2">
                                      <!-- Checkbox -->
                                      <div class="custom-control custom-radio text-dark">
                                          <input type="radio" data-arg="<?php echo $guidedHelpResult->casebase->id; ?>" name="<?php echo $question->id; ?>" id="<?php echo $vl->id; ?>" value="<?php echo $vl->id; ?>" class="custom-control-input getGuidedHelp">
                                          <label class="custom-control-label" for="<?php echo $vl->id; ?>"><?php echo $vl->text; ?></label>
                                      </div>
                                      <!-- End Checkbox -->
                                  </div>
                              <?php } ?>
                          </div>

                          <div class="mt-4" id="completeGh" style="display:none">
                              <button type="button" onclick="window.open('./', '_self')" class="btn btn-primary btn-sm mr-5">Done</button>
                              <button type="button" onclick="window.open('guided-help', '_self')" class="btn btn-outline-primary btn-sm ml-5">Restart</button>
                          </div>
                      <?php } else { ?>
                          <span>No casebase Retrieved.</span>
                      <?php } ?>


                  <?php } else { ?>

                      <span>Error: Unable to load guided Help. Please refresh or try again.</span>

                  <?php } ?>


              </div>
          </div>
          <!-- End Card -->


      </div>
      <!-- End Content -->