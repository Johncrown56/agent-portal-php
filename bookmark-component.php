<!-- Card -->
<?php
$api = 'bookmark';
$method = 'GET';
$params = array(
    '$rangesize' => 5,
);
$bookmarkResults = CallAPI($method, $api, $params);
//var_dump($bookmarkResults);

?>
<!-- Article -->
<div class="card card-bordered mt-5 p-4 p-md-7">
    <!-- <h1 class="h2">What's Front?</h1>
          <p>How Front works, what it can do for your business and what makes it different to other solutions.</p> -->
    <?php
    if ($bookmarkResults->callInfo->httpStatus == 200 && $bookmarkResults->callInfo->status == "success") {
    ?>
        <!-- Title -->
        <div class="row justify-content-lg-between align-items-lg-center mt-7 mb-3">
            <div class="col-sm-auto">
                <h3 class="h4"></h3>
            </div>
            <div class="col-sm text-sm-right">
                <small><?php count($bookmarkResults->bookmark) ?> articles</small>
            </div>
        </div>
        <!-- End Title -->

        <?php
        if (count($bookmarkResults->bookmark) > 0) {
            foreach ($bookmarkResults->bookmark as $key => $value) {
                $name = $value->name;
        ?>

                <!-- Card -->
                <a class="card card-frame py-3 px-4 mb-2" href="<?php echo $articleDir . '/' . $value->resourceId . '/' . clean_and_hyphenate($value->name); ?>">
                    <div class="row align-items-sm-center">
                        <span class="col-sm-8 text-dark">
                            <i class="fas fa-bookmark mr-1 text-primary font-size-40"></i> &nbsp;
                            <?php echo $value->resourceName; ?>
                        </span>
                        <span class="col-sm-4 text-danger font-size-1 text-right deletebookmark" id="<?php echo $value->resourceId;?>">
                            Remove <i class="fas fa-times fa-sm ml-1"></i>
                        </span>
                    </div>
                </a>
                <!-- End Card -->
            <?php } ?>
        <?php } else { ?>
            <span class="font-size-40 text-dark text-center">No bookmark added yet!</span>
        <?php }
    } else { ?>
        <span class="font-size-40 text-dark text-center"><?php echo ucfirst($bookmarkResults->callInfo->status) . ': ' . $bookmarkResults->callInfo->httpStatus . ' ' . $bookmarkResults->callInfo->message; ?></span>
    <?php  } ?>

    <!-- <div class="text-center mt-5">
    <p>Can't find a position that suits you? <a class="font-weight-bold text-nowrap" href="#">Contact us <i class="fas fa-angle-right fa-sm ml-1"></i></a></p>
  </div> -->
    <!-- End Jobs Section -->

    <!-- Resolved -->
    <div class="text-center border-bottom my-1 py-3">
    </div>
    <div class="text-center my-1 py-1">
        <button type="button" class="btn btn-sm btn-soft-primary btn-pill btn-wide mb-2 mx-1">Load More</button>
    </div>
    <!-- End Resolved -->
</div>
<!-- End Article -->