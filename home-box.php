<?php

$json = file_get_contents('./assets/json/home-box.json');
// Converts it into a PHP object
$data = json_decode($json, true);
?>
<!-- Cards Section -->
<div class="space-1">
    <!-- Title -->
    <!-- <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Featured</h3>
    <a class="font-size-1 font-weight-bold" href="#">View All <i class='fas fa-angle-right fa-sm ml-1'></i></a>
  </div> -->
    <!-- End Title -->

    <!-- <div class="row mx-n2"> -->
    <div class="js-slick-carousel slick slick-equal-height slick-gutters-3 slick-center-mode-right slick-center-mode-right-offset" data-hs-slick-carousel-options='{
             "slidesToShow": 3,
             "responsive": [{
               "breakpoint": 1200,
                 "settings": {
                   "slidesToShow": 3
                 }
               }, {
               "breakpoint": 992,
                 "settings": {
                   "slidesToShow": 2
                 }
               }, {
               "breakpoint": 768,
               "settings": {
                 "slidesToShow": 2
               }
               }, {
               "breakpoint": 554,
               "settings": {
                 "slidesToShow": 1
               }
             }]
           }'>
        <!-- Card -->
        <?php
        foreach ($data as $key => $values) {
            $id = $values['id'];
            $img = $values['img'];
            $text2 = $values['text2'];
             $text = $values['text'];
            $topicId = $values['topicId'];
            $url = gettype($topicId) == "integer" ? 'topic/'.$topicId : $topicId;
            $target = gettype($topicId) == "integer" ? 'self' : '_blank';        
        ?>
            <div class="js-slide card h-100 px-1 mb-1">
                <!-- <div class=""> -->
                    <a class="card-body p-2" href="<?php echo $url; ?>" target="<?php echo $target;?>">
                        <div class="media">
                            <div class="avatar avatar-xs ml-1 mr-1">
                                <img class="avatar-img" src="<?php echo $img; ?>" alt="<?php echo $text; ?>">
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                </div>
                                <small class="d-block text-dark"><?php echo $text; ?></small>
                            </div>
                        </div>
                    </a>
                <!-- </div> -->
            </div>
        <?php } ?>
        <!-- End Card -->

    </div>
</div>
<!-- End Cards Section -->