<div class="mt-0">
    <b class="text-capitalize text-dark font-size-2">Related Articles</b>
</div>

<?php
                $api = 'article/related/'.$articleId;
                $method = 'GET';
                $params = array(
                  //'$level' => 0
                  '$rangesize' => 5,
                );
                $relatedArticlesResult = CallAPI($method, $api, $params);
                //var_dump($result);
                if (count($relatedArticlesResult->article) > 0 || !empty($relatedArticlesResult->article)) {
                ?>

<!-- Related Articles Section -->
<div class="mt-3">
    <div class="position-relative">
        <div class="mt-0">

            <div class="js-slick-carousel slick slick-equal-height slick-gutters-3 slick-center-mode-right slick-center-mode-right-offset" data-hs-slick-carousel-options='{
             "slidesToShow": 2,
             "dots": true,
            "dotsClass": "slick-pagination",
            "prevArrow": "<span class=\"fa fa-arrow-left slick-arrow slick-arrow-primary-white slick-arrow-left slick-arrow-centered-y shadow-soft rounded-circle ml-sm-n2\"></span>",
            "nextArrow": "<span class=\"fa fa-arrow-right slick-arrow slick-arrow-primary-white slick-arrow-right slick-arrow-centered-y shadow-soft rounded-circle mr-sm-2 mr-xl-4\"></span>",
             "responsive": [{
               "breakpoint": 1200,
                 "settings": {
                   "slidesToShow": 2
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

           <?php
                    foreach ($relatedArticlesResult->article as $key => $value) {
                      $name = $value->name;
                    ?>
                <article class="js-slide card card-bordered h-100">
                    <div class="w-sm-100 w-100 min-h-170rem p-4 transition-3d-hover">
                    <a href="<?php echo $articleDir.'/'.$value->id.'/'.clean_and_hyphenate($value->name); ?>">
                        <h6 class="text-dark font-size-1"><?php echo $value->name;?></h6>
                        </a>
                        <hr class="my-0 border-top">
                        <div class="mb-4">
                            <p class="font-weight-bold text-dark font-size-sm line-height-16">
                            <?php echo strlen($value->description) > 60 ? limitWord($value->description, 60) : $value->description;?>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 pr-0">
                                <ul class="list-inline font-size-15 mt-3">
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
                            <div class="col-lg-2 mt-2">
                                <a class="fa fa-angle-right oval-shape oval-shape oval-shape-centered-y rounded-circle ml-n4" href="<?php echo $articleDir.'/'.$value->id.'/'.clean_and_hyphenate($value->name); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } ?>

            </div>

            <!-- Title -->
            <!--<div class="row align-items-md-center mt-2">-->
            <!--    <div class="col-md-6 mb-4 mb-md-0">-->
            <!--    </div>-->
            <!--    <div class="col-md-6 text-md-right">-->
            <!--        <a class="font-weight-bold text-dark font-size-sm" href="javascript:;">See all</a>-->
            <!--    </div>-->
            <!--</div>-->
            <!-- End Title -->
        </div>

    </div>
</div>
<?php }  else { ?>
    <div>
    <p class="text-dark text-center">No related articles available</p>
    </div>
<?php } ?>
<!-- End Related Articles Section -->