      <!-- Content -->
      <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                  <li class="breadcrumb-item"><a class="breadcrumb-link" href="./">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">MTN academy</li>
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
            <h2 class="h4 mb-0">Files</h2>
          </div>

          <div class="col-auto">
            <!-- Nav -->
            <ul class="nav nav-segment" id="connectionsTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link text-black active" id="grid-tab" data-toggle="tab" href="#grid" role="tab" aria-controls="grid" aria-selected="true" title="Column view">
                 <i class="fas fa-border-all"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false" title="List view">
                <i class="fas fa-th-list"></i>
                </a>
              </li>
            </ul>
            <!-- End Nav -->
          </div>
        </div>
        <!-- End Header -->

        <!-- Tab Content -->
        <div class="tab-content" id="connectionsTabContent">
          <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
            <!-- Folders -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
            <?php
            $apiName = 'article';
            $meth = 'GET';
            $para = array(
                'topicId' => $mtnAcademyTopicId,
                '$rangesize' => 8,
            );
            $topicResults = CallAPI($meth, $apiName, $para);            
            foreach ($topicResults->article as $key => $value) {
            $timeagoFormat = change_time_format($value->lastModifiedDate);
            $api = 'article/'.$value->id;
            $method = 'GET';
            $params = array();
            $result = CallAPI($method, $api, $params);
            //var_dump($result);
            foreach($result->article[0]->attachment as $key => $val ){
                $api2 = 'article/attachment/' . $val->id;
                $meth = 'GET';
                $param = array();
                $attachmentResult = CallAPI($meth, $api2, $param);
                //var_dump($attachmentResult);
                foreach($attachmentResult->attachmentContent as $k => $v ){
                    $docName = $v->name;
                    $fileformat = pathinfo($docName, PATHINFO_EXTENSION);

            ?>
              <div class="col mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card card-sm card-hover-shadow card-header-borderless h-100 text-center">
                  <div class="card-header">
                    <small>25kb</small>

                    <!-- Unfold -->
                    <div class="hs-unfold ml-auto">
                      <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-ghost-secondary card-unfold rounded-circle" href="javascript:;"
                         data-hs-unfold-options='{
                           "target": "#filesGridDropdown<?php echo $val->id?>",
                           "type": "css-animation"
                         }'>
                        <i class="tio-more-vertical"></i>
                      </a>

                      <div id="filesGridDropdown<?php echo $val->id?>" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right" style="min-width: 13rem;">
                        <span class="dropdown-header">Settings</span>
                        <a class="dropdown-item" href="#">
                          <i class="tio-share dropdown-item-icon"></i> Share file
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="tio-download-to dropdown-item-icon"></i> Download
                        </a>
                      </div>
                    </div>
                    <!-- End Unfold -->
                  </div>

                  <div class="card-body">
                  <?php if ($fileformat == 'pdf'){ ?>
                                <img class="avatar avatar-4by3" src="./assets/svg/brands/pdf.svg" alt="<?php echo $docName?>">
                              <?php } else if ($fileformat == 'docs' || $fileformat == 'docx'){?>
                                <img class="avatar avatar-4by3" src="./assets/svg/brands/google-docs.svg" alt="<?php echo $docName?>">                              
                                <?php } else if ($fileformat == 'png' || $fileformat == 'jpg' || $fileformat == 'jpeg' || $fileformat == 'gif' ){ ?>
                                  <img class="avatar avatar-4by3" src="./assets/svg/components/placeholder-img-format.svg" alt="<?php echo $docName?>">                                
                                <?php } else if ($fileformat == 'csv' || $fileformat == 'xls'){ ?>
                                  <img class="avatar avatar-4by3" src="./assets/svg/brands/google-sheets.svg" alt="<?php echo $docName?>">                              
                                <?php } else{ ?>
                                  <img class="avatar avatar-4by3" src="./assets/svg/brands/google-slides.svg" alt="<?php echo $docName?>">
                                  <?php } ?>
                    <a class="stretched-link" href="<?php echo $domain.$attachmentResult->callInfo->redirectUrl?>" download></a>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title font-size-40"><?php echo $result->article[0]->name; ?>
                    <!-- <?php echo $val->name;?> -->
                </h5>
                    <!-- <h5 class="card-title font-size-40"><?php echo $v->name;?></h5> -->
                    <p class="small">Updated <?php echo $timeagoFormat?></p>
                  </div>
                </div>
                <!-- End Card -->
              </div>

              <?php } } }?>


            </div>
            <!-- End Folders -->
          </div>

          <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
            <ul class="list-group">
            <?php
            $apiName = 'article';
            $meth = 'GET';
            $para = array(
                'topicId' => $mtnAcademyTopicId,
                '$rangesize' => 8,
            );
            $topicResults = CallAPI($meth, $apiName, $para);
            foreach ($topicResults->article as $key => $value) {
            $timeagoFormat2 = change_time_format($value->lastModifiedDate);
            $api = 'article/'.$value->id;
            $method = 'GET';
            $params = array();
            $result = CallAPI($method, $api, $params);            
            //var_dump($result);
            foreach($result->article[0]->attachment as $key => $val ){
                $api2 = 'article/attachment/' . $val->id;
                $meth = 'GET';
                $param = array();
                $attachmentResult = CallAPI($meth, $api2, $param);
                //var_dump($attachmentResult);
                foreach($attachmentResult->attachmentContent as $k => $v ){
                    $docName = $v->name;                    
                    $fileformat = pathinfo($docName, PATHINFO_EXTENSION);

            ?>
              <!-- List Item -->
              <li class="list-group-item">
                <div class="row align-items-center gx-2">
                  <div class="col-auto">
                  <?php if ($fileformat == 'pdf'){ ?>
                                <img class="avatar avatar-xs avatar-4by3" src="./assets/svg/brands/pdf.svg" alt="<?php echo $docName?>">
                              <?php } else if ($fileformat == 'docs' || $fileformat == 'docx'){?>
                                <img class="avatar avatar-xs avatar-4by3" src="./assets/svg/brands/google-docs.svg" alt="<?php echo $docName?>">                              
                                <?php } else if ($fileformat == 'png' || $fileformat == 'jpg' || $fileformat == 'jpeg' || $fileformat == 'gif' ){ ?>
                                  <img class="avatar avatar-xs avatar-4by3" src="./assets/svg/components/placeholder-img-format.svg" alt="<?php echo $docName?>">                                
                                <?php } else if ($fileformat == 'csv' || $fileformat == 'xls'){ ?>
                                  <img class="avatar avatar-xs avatar-4by3" src="./assets/svg/brands/google-sheets.svg" alt="<?php echo $docName?>">                              
                                <?php } else{ ?>
                                  <img class="avatar avatar-xs avatar-4by3" src="./assets/svg/brands/google-slides.svg" alt="<?php echo $docName?>">
                                  <?php } ?>
                  </div>

                  <div class="col">
                    <h5 class="mb-0 font-size-40">
                      <a class="text-dark" href="<?php echo $domain.$attachmentResult->callInfo->redirectUrl?>" download><?php echo $result->article[0]->name; ?></a>
                    </h5>
                    <ul class="list-inline list-separator small">
                      <li class="list-inline-item">Updated <?php echo $timeagoFormat2;?></li>
                      <li class="list-inline-item">25kb</li>
                    </ul>
                  </div>

                  <div class="col-auto">
                    <!-- Unfold -->
                    <div class="hs-unfold">
                      <a class="js-hs-unfold-invoker btn btn-sm btn-white" href="javascript:;"
                         data-hs-unfold-options='{
                           "target": "#filesListDropdown<?php echo $val->id?>",
                           "type": "css-animation"
                         }'>
                        <span class="d-none d-sm-inline-block mr-1">More</span>
                        <i class="tio-chevron-down"></i>
                      </a>

                      <div id="filesListDropdown<?php echo $val->id?>" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right" style="min-width: 13rem;">
                        <span class="dropdown-header">Settings</span>

                        <a class="dropdown-item" href="#">
                          <i class="tio-share dropdown-item-icon"></i> Share file
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="tio-download-to dropdown-item-icon"></i> Download
                        </a>
                      </div>
                    </div>
                    <!-- End Unfold -->
                  </div>
                </div>
                <!-- End Row -->
              </li>
              <!-- End List Item -->
              <?php } } }?>

              
            </ul>
          </div>
        </div>
        <!-- End Tab Content -->
      </div>
      <!-- End Content -->