<!-- Card -->
<?php
/* Place the call to the APIs and handle the HTTP success and HTTP errors according to the eGain APIs */
$api = 'article/' . $articleId;
$method = 'GET';
$params = array(
    //'$level' => 0
);
$result = CallAPI($method, $api, $params);
//var_dump($result);

?>
<div>
    <?php include_once('breadcrumb.php'); ?>
</div>
<div class="w-75">
    <?php include_once('search-component.php'); ?>
</div>
<?php if (count($result->article) > 0 || !empty($result->article)) { ?>
    <div class="box-shadow-2 card-frame card mt-3">
        <div class="card-body card-body-height overflow-x-auto pl-6" id="printableArea">
            <b class="card-title font-size-50 text-dark mb-3"><?php echo $result->article[0]->name; ?></b>
            <?php 
            //echo $result->article[0]->content;
            //strip_tags($result->article[0]->content, '<li><a>');
            ?>
            <div class="text-dark"><?php echo $result->article[0]->content;?></div>
        </div>

        <!-- Footer -->
        <div class="card-footer pt-0 pb-0">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <span class="font-size-35 text-success" id="rating_resp"></span>
                </div>
                <div class="col-auto">
                    <span class="font-size-35 text-success" id="bookmark_resp"></span>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <span class="font-size-sm text-dark font-family-light">Was this content useful?</span>
                    <button type="button" class="btn btn-white btn-xs btn-pill rateArticle" id="<?php echo $result->article[0]->id; ?>" name="1">Yes</button>
                    <button type="button" class="btn btn-white btn-xs btn-pill rateArticle" id="<?php echo $result->article[0]->id; ?>" name="0">No</button>
                </div>

                <div class="col-auto">
                    <!-- Unfold (Dropdown) -->
                    <div class="hs-unfold">
                        <a href="javascript:;" class="js-hs-unfold-invoker text-dark font-size-sm font-weight-light font-family-light pl-1 pr-1" data-hs-unfold-options='{
       "target": "#basicDropdownClick",
       "type": "css-animation",
       "event": "click"
     }'><i class="fas fa-share-square ml-1"></i> Share
                        </a>
                        <button type="button" id="<?php echo $result->article[0]->id; ?>" class="btn btn-link text-dark font-size-sm font-weight-light font-family-light pl-1 pr-1 bookmarkArticle"><i class="fas fa-bookmark ml-1"></i> Bookmark</button>
                        <button type="button" class="btn btn-link text-dark font-size-sm font-weight-light font-family-light pl-1 pr-1" onclick="printDiv('printableArea')"><i class="fas fa-print ml-1"></i> Print</button>

                        <div id="basicDropdownClick" class="hs-unfold-content dropdown-unfold dropdown-menu mt-1">
                            <ul class="list-inline ml-2">
                                <li class="list-inline-item" data-toggle="modal" data-target="#shareModal">
                                    <a class="icon icon-xs icon-soft-dark icon-circle" data-toggle="tooltip" data-placement="top" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Share via Email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a class="icon icon-xs icon-soft-dark icon-circle" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Share via Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <!-- You can use rip_tags function or  strip_tags to strip html codes out of the content-->
                                    <a class="icon icon-xs icon-soft-dark icon-circle" href="https://wa.me/?text=<?php echo rip_tags($result->article[0]->content); ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Share via WhatsApp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!-- End Unfold -->
                </div>
            </div>
        </div>
        <!-- End Footer -->
    </div>

    <?php if ($result->article[0]->hasAttachments == true) { ?>
        <div class="mt-3">
            <?php include_once('attachment.php'); ?>
        </div>
<?php }
} ?>
<!-- End Card -->


<?php include_once('modals/share.php'); ?>