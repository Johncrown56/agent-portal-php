<?php
$query = str_replace(' ', '%20', $query);
$api = 'search';
$method = 'GET';
$params = array(
    'q' => $query,
    '$rangestart' => 0,
    '$rangesize' => 5,
    '$attribute' => 'all'
);
$searchResults = CallAPI($method, $api, $params);
// var_dump($result);
if (count($searchResults->article) > 0 || !empty($searchResults->article)) {
?>
<div class="box-shadow-2 card-frame card mt-3" >
    <div class="card-body card-body-height pl-6" id="search_article">
        <?php
        foreach ($searchResults->article as $key => $value) {
            $name = $value->name;
        ?>
        <div class="search-article" >
            <a href="<?php echo $articleDir.'/'.$value->id.'/'.clean_and_hyphenate($value->name);?>">
                <b class="card-title font-size-40 text-dark"><?php echo $value->name; ?></b>
            </a>
            <span class="font-family-light text-dark font-size-sm"><?php echo limitWord($value->contentText, 200); ?></span>           
            <!-- Learn More  -->
            <div class="row align-items-md-center mt-2">
                <div class="col-md-6 mb-4 mb-md-0">
                </div>
                <div class="col-md-6 text-md-right">
                    <a class="font-weight-bold text-dark font-size-35" target="self" href="<?php echo $articleDir.'/'.$value->id.'/'.clean_and_hyphenate($value->name) ?>" >
                    Learn More <i class="fas fa-angle-right fa-sm ml-1 ml-1"></i></a>
                </div>
            </div>
            <!-- End Learn More -->
        </div>
        <?php } ?>
    </div>

    <!-- Footer -->
    <div class="card-footer pt-0 pb-0">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto m-2">
                <input type="hidden" id="num" value="0">
                <button type="button" class="btn btn-primary btn-xs btn-pill search_more" id="<?php echo $query;?>">Load More <span id="count"></span></button>
            </div>

            <div class="col-auto">
            </div>
        </div>
    </div>
    <!-- End Footer -->
</div>
<?php } ?>
<!-- End Card -->