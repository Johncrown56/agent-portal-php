<!-- Card -->
<?php
$apiName = 'article';
$meth = 'GET';
$para = array(
    'topicId' => $topicId,
    '$rangesize' => 8,
);
$topicResults = CallAPI($meth, $apiName, $para);
//var_dump($topicResults);
?>
<div>
<?php include_once('topic-breadcrumb.php'); ?>
</div>
<div class="w-75">
    <?php include_once('search-component.php'); ?>
</div>
<?php if (count($topicResults->article) > 0 || !empty($topicResults->article)) { ?>
    <div class="box-shadow-2 card-frame card mt-3">
        <div class="card-body card-body-height pl-6">
            <?php
            foreach ($topicResults->article as $key => $value) {
                $name = $value->name;
            ?>
                <a class="card-title font-size-40 text-dark" href="<?php echo $articleDir . '/' . $value->id . '/' . clean_and_hyphenate($value->name) ?>"><?php echo $value->name; ?></a>
                <span class="font-family-light text-dark font-size-sm"><?php echo isset($value->description) ? $value->description: 'No description available'; ?></span>
                <!-- Learn More  -->
                <div class="row align-items-md-center mt-2">
                    <div class="col-md-6 mb-4 mb-md-0">
                    </div>
                    <div class="col-md-6 text-md-right">
                        <a class="font-weight-bold text-dark font-size-35" target="self" href="<?php echo $articleDir . '/' . $value->id . '/' . clean_and_hyphenate($value->name) ?>">
                            Learn More <i class="fas fa-angle-right fa-sm ml-1 ml-1"></i></a>
                    </div>
                </div>
                <!-- End Learn More -->
            <?php } ?>
        </div>

        <!-- Footer -->
        <div class="card-footer pt-0 pb-0">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto m-2">
                    <button type="button" class="btn btn-primary btn-xs btn-pill search_more" id="<?php echo $topicId; ?>">Load More</button>
                </div>

                <div class="col-auto">
                </div>
            </div>
        </div>
        <!-- End Footer -->
    </div>
<?php } ?>
<!-- End Card -->