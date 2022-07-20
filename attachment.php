
<span class="text-dark font-size-1">Attachment(s)</span>
<?php foreach($result->article[0]->attachment as $key => $val ){
$api2 = 'article/attachment/' . $val->id;
$meth = 'GET';
$param = array();
$attachmentResult = CallAPI($meth, $api2, $param);
//var_dump($attachmentResult);
foreach($attachmentResult->attachmentContent as $k => $v ){
?>
<!-- Card -->
<a class="card card-frame py-3 px-4 mt-2 mb-2" href="<?php echo $domain.$attachmentResult->callInfo->redirectUrl?>" download>
    <div class="row align-items-sm-center">
      <span class="col-sm-9 text-dark">
        <?php echo $val->name;?>
      </span>
      <span class="col-sm-3 text-right text-dark">
        Download <i class="fas fa-download fa-sm ml-1"></i>
      </span>
    </div>
  </a>
  <!-- End Card -->
  <?php } } ?>