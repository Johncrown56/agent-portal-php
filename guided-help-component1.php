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

          <!-- Card -->
          <div class="card">
              <div class="card-header">
                  <h5 class="card-header-title">Question and Answer</h5>
                  <!-- <small class="text-muted">2 days ago</small> -->
              </div>
              <div class="card-body">


              <?php
            $api = 'case';
            $method = 'GET';
            $params = array(
                'releaseId'=>200101000000710,
                'clusterId'=>1000001065
            );
             $guidedHelpResult = CallAPI($method, $api, $params);
             var_dump($guidedHelpResult);
             if($guidedHelpResult->callInfo->status  == "success"){
            if (count($guidedHelpResult->case) > 0 || !empty($guidedHelpResult->case)) {
        ?>
                  <h6 class="card-title mb-3"><i class="fas fa-question-circle"></i> <?php echo $guidedHelpResult->case[0]->questionDetail[0]->question->title?></h6>
                  <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

                  <?php 
                  $count = 0;
                     foreach ($guidedHelpResult->case as $ky => $value) {
                        $count = ++$count;
            ?>
                  <div class="form-group mb-2">
                      <!-- Checkbox -->
                      <div class="custom-control custom-radio text-dark">
                          <input type="radio" 
                          data-arg="<?php echo serialize($value->questionDetail[0]->answer[0]);?>" 
                          name="answerRadio_<?php echo $value->questionDetail[0]->question->id;?>" 
                          id="<?php echo $value->questionDetail[0]->answer[0]->conceptId;?>" 
                          value="<?php echo $value->questionDetail[0]->answer[0]->conceptId;?>" 
                          class="custom-control-input getGuidedHelp" >
                          <!-- <input type="radio" name="answerRadio_1000001076" id="1000001070" value="1000001070" ng-click="updateSelectedAnswer(question, response);$event.stopPropagation()"> -->
                          <label class="custom-control-label" 
                          for="<?php echo $value->questionDetail[0]->answer[0]->conceptId;?>">
                          <?php echo $value->questionDetail[0]->answer[0]->conceptName;?>
                        </label>
                      </div>
                      <!-- End Checkbox -->
                  </div>
                  <?php } ?>
                  

                  <div class="mt-4">
                      <button type="button" class="btn btn-primary btn-sm">Done</button>
                  </div>

                  <?php } else { ?>
                    <span>No casebase Retrieved.</span>
                  <?php } ?>
                
                
                <?php } else { ?>

                  <span>Error: Unable to load guided Help. Please refresh try again.</span>

                  <?php } ?>


              </div>
          </div>
          <!-- End Card -->


      </div>
      <!-- End Content -->