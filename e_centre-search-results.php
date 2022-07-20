<?php
$q = $_GET['q'];

?>
<!-- Search result Content -->
<div class="form">
  <input type="hidden" id="search" value="<?php echo $q;?>" name="se">
</div>

<div class="row m-lg-3" >
  <div class="col-lg-12" id="results">
  </div>
</div>
<!-- End Search result Content -->

<div id="pager">
  <ul id="pagination" class="pagination justify-content-center"></ul>
</div>