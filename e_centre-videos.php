<div class="mb-8 mt-4">
  <!-- Nav -->
  <div class="text-left">
    <ul class="nav nav-segment nav-pills scrollbar-horizontal mb-7" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="trending-videos-tab" data-toggle="pill" href="#trending-videos" role="tab" aria-controls="trending-videos" aria-selected="true">Trending Videos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="latest-videos-tab" data-toggle="pill" href="#latest-videos" role="tab" aria-controls="latest-videos" aria-selected="false">Latest Videos</a>
      </li>
    </ul>
  </div>
  <!-- End Nav -->

  <!-- Tab Content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="trending-videos" role="tabpanel" aria-labelledby="trending-videos-tab">

      <!-- Videos Section -->
      <div class="container">
        <!-- List Group -->
        <ul class="list-group mb-5">
          <?php
          $api = 'search';
          $method = 'GET';
          $params = array(
            'part' => 'snippet',
            'maxResults' => 5,
            'channelId' => CHANNELID,
            'order'=> 'viewCount',                 
            'type' => 'video',
          );
          $trendingVideos = callYoutubeAPI($method, $api, $params);
          //var_dump($playlist);
          if (isset($trendingVideos->items)) {
          ?>
            <?php
            foreach ($trendingVideos->items as $key => $value) {
                $treVidApi = 'videos';
                $treVidMet = 'GET';
                $treVidParam = array(
                    'part' => 'snippet',
                    'part' => 'statistics',
                    'id' => $value->id->videoId,
                );
                $trendingVidStatResult = callYoutubeAPI($treVidMet, $treVidApi, $treVidParam);
            ?>
              <!-- List Item -->
              <li class="list-unstyled mb-3">
                <a class="js-fancybox media" href="javascript:;" data-hs-fancybox-options='{
             "src": "//youtube.com/<?php echo $value->id->videoId; ?>",
             "caption": "<?php echo htmlspecialchars($value->snippet->title, ENT_QUOTES); ?>",
             "speed": 700,
             "buttons": ["fullScreen", "close"],
             "youtube": {
               "autoplay": 1
             }
           }'>
                  <div class="avatar avatar-sm d-block bg-yellow text-center rounded cp-25 my-auto">
                    <i class="fas fa-play text-dark"></i>
                  </div>

                  <div class="media-body ml-3">
                    <div class="row">
                      <div class="col-sm-12 mt-2 mb-sm-0 font-weight-bold font-size-25">
                        <span class="d-block text-dark"><?php echo $value->snippet->title; ?></span>
                        <span class="d-block text-dark">
                          <?php
                          $txt = ' View';
                          if(isset($trendingVidStatResult)){ echo restyle_text($trendingVidStatResult->items[0]->statistics->viewCount);}
                          echo $txt = $trendingVidStatResult->items[0]->statistics->viewCount > 1 ? $txt.'s' : $txt;
                          ?> 
                           
                        <?php
                        $text = ' Comment';
                         if(isset($trendingVidStatResult)){ 
                           echo $trendingVidStatResult->items[0]->statistics->commentCount;
                        } else {echo 'null';}
                        echo $text = $trendingVidStatResult->items[0]->statistics->commentCount > 1 ? $text.'s' : $text;
                        ?> 
                        </span>
                      </div>
                    </div>
                    <!-- End Row -->
                  </div>
                </a>
              </li>
              <!-- End List Item -->
            <?php } ?>
          <?php } else { ?>
            <div>
              <p class="text-dark text-center">No Trending videos available.</p>
            </div>
          <?php } ?>
        </ul>
      </div>
      <!-- End videos Section -->
    </div>

    <div class="tab-pane fade" id="latest-videos" role="tabpanel" aria-labelledby="latest-videos-tab">
      <!-- Articles Section -->
      <div class="container">
        <!-- List Group -->
        <ul class="list-group mb-5">
          <?php
          $ap = 'playlistItems';
          $meth = 'GET';
          $param = array(
            'part' => 'snippet',
            //'part' => 'contentDetails',
            'playlistId' => CHANNELPLAYLISTID,
            'maxResults' => 5,
          );
          $latestVideos = callYoutubeAPI($meth, $ap, $param);
          //var_dump($latestVideos);
          if (count($latestVideos->items) > 0 || !empty($latestVideos->items)) {
          ?>
            <?php
            foreach ($latestVideos->items as $key => $val) {
              $latVidApi = 'videos';
              $latVidMet = 'GET';
              $latVidParam = array(
                  'part' => 'snippet',
                  'part' => 'statistics',
                  'id' => $val->snippet->resourceId->videoId,
              );
              $latestVidStatResult = callYoutubeAPI($latVidMet, $latVidApi, $latVidParam);
            ?>
              <!-- List Item -->
              <li class="list-unstyled mb-3">
                <a class="js-fancybox media" href="javascript:;" data-hs-fancybox-options='{
             "src": "//youtube.com/<?php echo $val->snippet->resourceId->videoId; ?>",
             "caption": "<?php echo htmlspecialchars($val->snippet->title, ENT_QUOTES); ?>",
             "speed": 700,
             "buttons": ["fullScreen", "close"],
             "youtube": {
               "autoplay": 1
             }
           }'>
                  <div class="avatar avatar-sm d-block bg-yellow text-center rounded cp-25 my-auto">
                    <i class="fas fa-play text-dark"></i>
                  </div>

                  <div class="media-body ml-3">
                    <div class="row">
                      <div class="col-sm-12 mt-2 mb-sm-0 font-weight-bold font-size-25">
                        <span class="d-block text-dark"><?php echo $val->snippet->title; ?></span>
                        <span class="d-block text-dark">
                          <?php 
                          $txt2 = ' View';
                        echo isset($latestVidStatResult) ? restyle_text($latestVidStatResult->items[0]->statistics->viewCount) : 'null';
                        echo $txt2 = $latestVidStatResult->items[0]->statistics->commentCount > 1 ? $txt2.'s' : $txt2;?> 
                         
                        <?php 
                        $text2 = ' Comment';
                        if(isset($latestVidStatResult)){ echo $latestVidStatResult->items[0]->statistics->commentCount;}  else {echo 'null';}                       
                        echo $text2 = $latestVidStatResult->items[0]->statistics->commentCount > 1 ? $text2.'s' : $text2;
                        ?>
                        </span>
                        
                      </div>
                    </div>
                    <!-- End Row -->
                  </div>
                </a>
              </li>
              <!-- End List Item -->
            <?php } ?>
          <?php } else { ?>
            <div class="text-center">
              <p class="text-dark">No latest videos available.</p>
            </div>
          <?php } ?>
        </ul>
      </div>
      <!-- End Articles Section -->
    </div>
  </div>
  <!-- End Tab Content -->
</div>