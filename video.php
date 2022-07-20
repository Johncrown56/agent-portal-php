<?php include_once('header.php');
$pid = $_GET['pid'];

$api = 'playlistItems';
$method = 'GET';
$params = array(
    'part' => 'snippet',
    'maxResults' => 6,
    'playlistId' => $pid,
);
$playlistItems = callYoutubeAPI($method, $api, $params);
//var_dump($playlist);

$playApi = 'playlists';
$playMethod = 'GET';
$playParams = array(
    'part' => 'snippet',
    'id' => $pid,
);
$playlistResult = callYoutubeAPI($playMethod, $playApi, $playParams);
?>
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">

    <!-- Categories Section -->
    <div class="container space-top-1 space-top-md-2 space-bottom-2">
        <!-- Title Section -->
        <div class="bg-white pt-3">
            <div class="container pt-5 pr-0">
                <div class="row align-items-sm-center">
                    <div class="col-sm-4 mb-3 pl-lg-0 mb-sm-0">
                        <div class="ml-lg-4">
                            <div class="row">
                                <!-- Card -->
                                <div class="col-lg-2 pl-0">
                                    <div class="avatar avatar-xl d-block">
                                        <img class="avatar-img" src="<?php echo passImg($pid);?>">
                                    </div>

                                </div>
                                <div class="col-lg-10">
                                    <div class="ml-2">
                                        <h1 class="h4 mb-2"><?php echo $playlistResult->items[0]->snippet->title;?></h1>
                                        <a class="btn btn-xs btn-outline-primary btn-pill font-weight-light primary-hover " href="experience-center">Change Device</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-8 pr-0">
                        <div class="row">
                            <div class="col-md-7 w-75">
                                <?php include_once('e_centre-search-component.php'); ?>
                            </div>

                            <div class="col-md-5  text-md-right">
                                <?php include_once('e_centre-icon_list.php'); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Title Section -->




        <div class="row">
            <div class="col-lg-3 mb-7 mb-lg-0">
                <!-- Nav -->
                <ul class="nav nav-pills mb-7" role="tablist">
                    <?php
                    $count = 0;
                    foreach ($playlistItems->items as $key => $value) {
                        $c = ++$count;
                    ?>
                        <li class="nav-item w-100 mx-0 mb-1">
                            <a class="nav-link p-2 primary-hover font-size-40 border-radius-6 btn-pill <?php if ($c == 1) {
                                                                                                            echo 'active';
                                                                                                        } else {
                                                                                                            echo '';
                                                                                                        } ?> " id="<?php echo $value->id; ?>-tab" data-toggle="pill" href="#<?php echo $value->id; ?>" role="tab" aria-controls="<?php echo $value->id; ?>" aria-selected="true">
                                <?php echo $value->snippet->title; ?>
                            </a>
                        <?php } ?>
                        </li>

                </ul>
                <!-- End Nav -->
            </div>

            <div class="col-lg-9 bg-grey">
                <!-- Tab Content -->
                <div class="tab-content">
                    <?php
                    $count = 0;
                    foreach ($playlistItems->items as $key => $value) {
                        $co = ++$count;
                        $vidApi = 'videos';
                        $vidMet = 'GET';
                        $vidParam = array(
                            'part' => 'snippet',
                            'part' => 'statistics',
                            'id' => $value->snippet->resourceId->videoId,
                        );
                        $VidStatResult = callYoutubeAPI($vidMet, $vidApi, $vidParam);

                    ?>
                        <div class="tab-pane fade p-0 <?php if ($co == 1) {
                                                            echo 'show active';
                                                        } else {
                                                            echo '';
                                                        } ?>" id="<?php echo $value->id; ?>" role="tabpanel" aria-labelledby="<?php echo $value->id; ?>-tab">
                            <div class="row mt-lg-5 m-lg-3">
                                <div class="col-lg-8 border-right">
                                    <div class="text-right mb-1">
                                        <i class="fas fa-bookmark text-yellow mr-1"></i>
                                        <span class="text-dark font-size-35"> Add to favorites/Bookmarks</span>
                                    </div>
                                    <div class="mb-2 mb-sm-3">
                                        <!-- Video Block -->
                                        <div id="youTubePlayer<?php echo $co; ?>" class="video-player bg-dark d-none d-md-block rounded-lg">
                                            <img class="img-fluid video-player-preview rounded-lg" src="<?php echo isset($value->snippet->thumbnails->standard->url) ? $value->snippet->thumbnails->standard->url : './assets/svg/logos/mtn_logo.svg'; ?>" alt="Image">

                                            <!-- Play Button -->
                                            <a class="js-inline-video-player video-player-btn video-player-centered" href="javascript:;" data-hs-video-player-options='{
                                                "videoId": "<?php echo $value->snippet->resourceId->videoId; ?>",
                                                "parentSelector": "#youTubePlayer<?php echo $co; ?>",
                                                "targetSelector": "#youTubeIframe<?php echo $co; ?>",
                                                "isAutoplay": true,
                                                "classMap": {
                                                    "toggle": "video-player-played"
                                                }
                                                }'>
                                                <span class="video-player-icon">
                                                    <i class="fas fa-play"></i>
                                                </span>
                                            </a>
                                            <!-- End Play Button -->

                                            <!-- Video Iframe -->
                                            <div class="embed-responsive embed-responsive-16by9 rounded-lg">
                                                <div id="youTubeIframe<?php echo $co; ?>"></div>
                                            </div>
                                            <!-- End Video Iframe -->
                                        </div>
                                        <!-- End Video Block -->
                                    </div>
                                    <div class="row">
              <div class="col-lg mb-3 mb-lg-0">
                <ul class="list-inline font-size-1">
                  <li class="list-inline-item">
                    <i class="far fa-clock text-dark mr-1"></i><?php echo date("M. d, Y", strtotime($value->snippet->publishedAt)); ?>
                  </li>
                  <li class="list-inline-item">
                  <i class="far fa-eye text-dark mr-1"></i><?php if(isset($VidStatResult)){ echo restyle_text($VidStatResult->items[0]->statistics->viewCount);}?> VIEWS
                </li>
                </ul>
              </div>
              
              <div class="col-lg-auto align-self-lg-end text-lg-right">
              <ul class="list-inline font-size-1">
                  <li class="list-inline-item">
                    <i class="fas fa-thumbs-up text-primary mr-1"></i><?php if(isset($VidStatResult)){ echo restyle_text($VidStatResult->items[0]->statistics->likeCount);}?>
                  </li>
                  <li class="list-inline-item">
                  <i class="fas fa-thumbs-down text-primary mr-1"></i><?php if(isset($VidStatResult)){ echo restyle_text($VidStatResult->items[0]->statistics->dislikeCount);}?>
                </li>
                </ul>
              </div>
            </div>
                                </div>

                                <div class="col-lg-4 mb-3 mb-sm-5">
                                    <span class="text-dark text-left">Related Videos</span>
                                    <?php 
                                    $api = 'search';
                                    $method = 'GET';
                                    $params = array(
                                        'part' => 'snippet',
                                        'maxResults' => 5,
                                        'channelId'=> CHANNELID,
                                        'relatedToVideoId' => $value->snippet->resourceId->videoId,
                                        'type'=>'video',
                                        'order'=>'date'
                                    );
                                    $relatedVidResult = callYoutubeAPI($method, $api, $params);
                                    if (count($relatedVidResult->items) > 0 || !empty($relatedVidResult->items)) {                                    
                                    
                                    foreach ($relatedVidResult->items as $key => $val) {
                                    $relVidApi = 'videos';
                                    $relVidMet = 'GET';
                                    $relVidParam = array(
                                        'part' => 'snippet',
                                        'part' => 'statistics',
                                        'id' => $val->id->videoId,
                                    );
                                    $relatedVidStatResult = callYoutubeAPI($relVidMet, $relVidApi, $relVidParam);
                                    ?>

                                    <div class="row mt-2 mb-2">
                                        <!-- Card -->
                                        <div class="col-lg-3">
                                            <a class="js-fancybox card font-weight-bold text-dark" href="javascript:;" data-hs-fancybox-options='{
                                                    "src": "//youtube.com/<?php echo $val->id->videoId; ?>",
                                                    "caption": "<?php echo htmlspecialchars($val->snippet->title, ENT_QUOTES); ?>",
                                                    "speed": 700,
                                                    "buttons": ["fullScreen", "close"],
                                                    "youtube": {
                                                    "autoplay": 1
                                                    }
                                                }'>
                                                <div class="avatar avatar-md d-block bg-yellow text-center rounded py-3 mx-auto">
                                                    <i class="fas fa-play text-dark"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="ml-2">
                                                <a class="js-fancybox font-weight-bold text-dark" href="javascript:;" data-hs-fancybox-options='{
                                                    "src": "//youtube.com/<?php echo $val->id->videoId; ?>",
                                                    "caption": "<?php echo htmlspecialchars($val->snippet->title, ENT_QUOTES); ?>",
                                                    "speed": 700,
                                                    "buttons": ["fullScreen", "close"],
                                                    "youtube": {
                                                    "autoplay": 1
                                                    }
                                                }'>
                                                    <ul class="list-inline font-size-25">
                                                        <li><?php echo $val->snippet->title; ?></li>
                                                        <li><?php echo $playlistResult->items[0]->snippet->title;?></li>
                                                        <li class="list-inline-item text-yellow">
                                                            <i class="fas fa-thumbs-up mr-1"></i><span class="text-dark"><?php if(isset($relatedVidStatResult)){ echo restyle_text($relatedVidStatResult->items[0]->statistics->likeCount);}?></span>
                                                        </li>
                                                    </ul>
                                                </a>
                                                <!-- End Card -->
                                                <ul class="list-inline font-size-25">
                                                    <li class="list-inline-item text-dark">
                                                        <i class="far fa-clock text-dark mr-1"></i><?php echo date("M. d, Y", strtotime($val->snippet->publishedAt)); ?>
                                                    </li>
                                                    <li class="list-inline-item text-dark">
                                                        <i class="far fa-eye text-dark"></i> <?php if(isset($relatedVidStatResult)){ echo restyle_text($relatedVidStatResult->items[0]->statistics->viewCount);}?> VIEWS
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } } else { ?>
                                    <div class="text-center">
                                    <p class="text-dark">No related videos available.</p>
                                    </div>
                                <?php } ?>

                                    
                                </div>


                            </div>
                        </div>
                    <?php } ?>

                </div>
                <!-- End Tab Content -->
            </div>
        </div>
    </div>
    <!-- End Categories Section -->

</main>
<!-- ========== END MAIN CONTENT ========== -->

<?php include_once('footer.php'); ?>