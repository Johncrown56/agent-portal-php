<?php
$jsonRes = file_get_contents('./assets/json/e-centre-box.json');
// Converts it into a PHP object
$data2 = json_decode($jsonRes, true);
?>

<?php
$api = 'playlists';
$method = 'GET';
$params = array(
    'part' => 'snippet',
    'maxResults' => 6,
    'channelId' => CHANNELID,
);
$playlist = callYoutubeAPI($method, $api, $params);
 //var_dump($playlist);
 if(isset($playlist->items)){
?>

<!-- Cards Section -->
  <div class="row mx-n2 mt-4">
  <?php
        // foreach ($data2 as $key => $values) {
        //     $id2 = $values['id'];
        //     $img2 = $values['img'];
        //     $text1 = $values['text'];
        //     $text2 = $values['text2'];
        //     $url2 = $values['url'];
        foreach ($playlist->items as $key => $value) {          
          $text2 = 'The most affordable smartphone money can buy';
          if($value->id == 'PLqHXrPnpTEgyLNq4d628dAe60W_SR3CED'){
            $img2 = './assets/svg/mtn/hynet.png';
            $text1 = 'MTN MiFi <br>Device ';
            $url2 = '';
          } else if($value->id == 'PLqHXrPnpTEgwGHqqMz4rznYU4ixnHMDUH'){
            $img2 = './assets/svg/mtn/smart-feature-phone-black-front.png';
            $text1 = 'MTN Smart Feature phone';
            $url2 = 'video';
          } else if($value->id == 'PLqHXrPnpTEgxT0Y4yLbdu28iKgw3LjmcP'){            
            $img2 = './assets/svg/mtn/Hynetflex.png';
            $text1 = 'MTN HynetFlex';
            $url2 = '';            
          }else if($value->id == 'PLqHXrPnpTEgyd9_oaNbiZomZjv_Doo4XQ'){
            $img2 = './assets/svg/mtn/android.png';
            $text1 = 'Android Devices';
            $url2 = '';
          }else if($value->id == 'PLqHXrPnpTEgzk6q-S8qov7UiAIO0upuDf'){            
            $img2 = './assets/svg/mtn/apple_logo.png';
            $text1 = 'iOS Devices';
            $url2 = '';
          }else if($value->id == 'PLqHXrPnpTEgxNjig6ywmiJpS4S54hjlAx'){            
            $img2 = './assets/svg/mtn/eSIM.png';
            $text1 = 'eSIM & <br>data gadgets';
            $url2 = '';
          } else{
            $img2 = './assets/svg/mtn/eSIM.png';
            $text1 = 'eSIM & <br>data gadgets';
            $url2 = '';
          }
        ?>
    <!-- Card -->
    <!-- <div class="col-sm-6 col-md-4 px-2 mb-3">
      <div class="card card-frame e-centre-box h-100">
        <a class="card-body p-2" href="video/<?php echo $value->id; ?>">
          <div class="media">
            <div class="avatar avatar-xl mt-1">
              <img class="avatar-img" src="<?php echo $value->img; ?>" alt="Image Description">
            </div>
            <div class="media-body mt-3 text-dark">
              <div class="d-flex align-items-center">
                <span class="d-block font-size-40 font-weight-bold"><?php echo $value->snippet->title; ?></span>                
              </div>
              <small class="d-block font-size-25 font-family-light"><?php echo $value->snippet->description; ?></small>
            </div>
          </div>
        </a>
      </div>
    </div> -->
    <div class="col-sm-6 col-md-4 px-2 mb-3">
      <div class="card card-frame e-centre-box h-100">
        <a class="card-body p-2" href="videos/<?php echo $value->id; ?>">
          <div class="media">
            <div class="avatar avatar-xl mt-1">
              <img class="avatar-img" src="<?php echo $img2; ?>" alt="Image Description">
            </div>
            <div class="media-body mt-3 text-dark">
              <div class="d-flex align-items-center">
                <span class="d-block font-size-40 font-weight-bold"><?php echo $text1; ?></span>                
              </div>
              <small class="d-block font-size-25 font-family-light"><?php echo $text2; ?></small>
            </div>
          </div>
        </a>
      </div>
    </div>
    <!-- End Card -->
    <?php }  ?>

  </div>
<!-- End Cards Section -->
<?php } else { ?>
  <div class="text-align">
    <p><?php echo $error->errors->message; ?></p>
  </div>

<?php }?>