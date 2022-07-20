<div id="stickyBlockStartPoint" class="">
  <!-- Card -->
  <div class="card card-bordered <?php checkTurboUrl('bg-mtn-soft-yellow', 'bg-mtn-momo'); ?>">
    <div class="card-body p-3">
      <div class="border-bottom">
        <b class="<?php checkTurboUrl('text-dark', 'text-white');?>">Trending</b>
      </div>
      <div class="mb-5 mt-3">
        <!-- Nav -->
        <div class="text-center">
          <ul class="nav nav-segment2 nav-pills scrollbar-horizontal mb-1" role="tablist">
            <li class="nav-item">
              <a class="nav-link <?php checkHomeUrl('pad-25', 'pad-28');?> active" id="pills-two-tab" data-toggle="pill" href="#pills-two" role="tab" aria-controls="pills-two-code-features-example1" aria-selected="false">Most Viewed</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php checkHomeUrl('pad-25', 'pad-28');?>" id="pills-one-tab" data-toggle="pill" href="#pills-one" role="tab" aria-controls="pills-one-code-features-example1" aria-selected="true">Super Staff</a>
            </li>
            
          </ul>
        </div>
        <!-- End Nav -->

        <!-- Tab Content -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="pills-two" role="tabpanel" aria-labelledby="pills-two">
            <div class="mb-3">
              <b class="<?php checkTurboUrl('text-dark', 'text-white');?> font-weight-bold font-size-25">Most Viewed Content of the month</b>
            </div>
            <?php
            $ap = 'dfaq';
            $method = 'GET';
            $param = array(
              '$level' => 0,
            );
            $res = CallAPI($method, $ap, $param);
            if (count($res->article) > 0 || !empty($res->article)) {
              $count = 1;
              foreach ($res->article as $key => $value) {

            $artAPI = 'article/'.$value->id;
            $artMethod = 'GET';
            $artParam = array();
            $artRes = CallAPI($artMethod, $artAPI, $artParam);
            $artTopicId = $artRes->article[0]->topicBreadcrumb[0]->topic[0]->id;

            if(isset($artTopicId)){
              $imgAPI = 'topic/'.$artTopicId;
              $imgMethod = 'GET';
              $imgParam = array(
                '$level' => '-1',
              );
              $imgRes = CallAPI($imgMethod, $imgAPI, $imgParam);
              $topicImg = isset($imgRes->topicTree[0]->topic->imageUrl) ? $imgRes->topicTree[0]->topic->imageUrl : '';
            }               
            
                  
            ?>

                <a href="<?php echo $articleDir . '/' . $value->id . '/' . clean_and_hyphenate($value->name) ?>">
                  <dl class="row font-size-1 mt-1">
                    <dt class="col-sm-2 pr-0 mb-2 mb-sm-0"><b class="font-size-25 <?php checkTurboUrl('text-dark', 'text-white');?>"><?php echo $count++ . '.'; ?></b></dt>
                    <dd class="col-sm-10 pl-0 <?php checkTurboUrl('text-dark', 'text-white'); ?>">
                      <b class="font-size-25 font-weight-bold pr-0 mb-0"><?php echo $value->name; ?> </b> 
                      <span>&nbsp;</span> 
                      <?php if(isset($topicImg)){?>
                      <img src="<?php echo $topicImg;?>" onerror="this.src='./assets/svg/mtn/agility-and-clm.png'" style="width: 20px; height: 20px;">
                      <?php }?>
                      
                      <br>
                      <small class="mb-0"><?php echo $value->description; ?></small>
                    </dd>
                  </dl>
                </a>

              <?php }
            } else { ?>
              <div class="text-center">
                <b class="<?php checkTurboUrl('text-dark', 'text-white'); ?> font-size-25">No articles available</b>
              </div>
            <?php } ?>

          </div>
          <div class="tab-pane fade" id="pills-one" role="tabpanel" aria-labelledby="pills-one">

            <div class="mb-3">
              <b class="<?php checkTurboUrl('text-dark', 'text-white'); ?> font-weight-bold font-size-25">Top Performing Agents for the month</b>
            </div>

            <?php
            
            $agentResult = null;

            if($agentResult != null){

            $json = file_get_contents('./assets/json/agents.json');
            // Converts it into a PHP object
            $agent = json_decode($json, true);
            ?>
            <?php
            foreach ($agent as $key => $values) {
              $id = $values['id'];
              $name = $values['name'];
              $team = $values['team'];
              $location = $values['location'];
            ?>

              <dl class="row font-size-1">
                <dt class="col-sm-4 mb-2 mb-sm-0">
                  <figure class="max-w-8rem w-100">
                    <img class="avatar avatar-lg avatar-circle" src="assets/images/pics/demo.png" alt="demo">
                  </figure>
                </dt>
                <dd class="col-sm-8 <?php checkTurboUrl('text-dark', 'text-white'); ?>">
                  <b class="font-size-25 mb-0"><?php echo $name; ?></b><br>
                  <b class="font-size-25 mb-0"><?php echo $team; ?> Team</b><br>
                  <b class="font-size-25 mb-0">CC | <?php echo $location; ?></b><br>
                  <a href="javascript:;"><span class="badge badge-primary badge-pill text-dark">Drop a message &nbsp;
                      <i class="fas fa-envelope text-dark"></i></span>
                  </a>
                </dd>
              </dl>

            <?php } } else {?>
            
            <div>
                <p class="font-size-1 text-center text-white">No results yet.</p>
              </div>

              <?php } ?>

          </div>

          
        </div>
        <!-- End Tab Content -->
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>