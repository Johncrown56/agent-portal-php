<?php include_once('header.php'); 
include_once('aside.php');
?>

  <main id="content" role="main" class="main splitted-content-main">
    <!-- main Content -->
    <!--<div class="splitted-content-fluid content-space mt-12 ml-3">-->
    <!--   <iframe width="560" height="315" -->
    <!--src="https://help.mtnonline.com/system/templates/selfservice/agent/help/customer/locale/en-us/portal/200200000001000/casebase/200101000000710/Agent-Guided-Help" -->
    <!--frameborder="0" allowfullscreen></iframe> -->
    <!--</div>-->
    <!-- main Content -->    
    
    
     <?php
            // $api = 'case';
            // $method = 'GET';
            // $params = array(
            //     'releaseId'=>200101000000710,
            //     'clusterId'=>1000001065
            // );
            // $secTierTopicsResult2 = CallAPI($method, $api, $params);
            // $count = 0;
            // if (count($secTierTopicsResult2->topicTree) > 0 || !empty($secTierTopicsResult2->topicTree)) {
            //   foreach ($secTierTopicsResult2->topicTree as $key => $values) {
            //    echo $count = ++$count;
        ?>
              <!-- <button id="" onclick="window.open('./topic/<?php echo $values->topic->id; ?>','_self')" type="default" class="mtn-btn mtn-btn--text-left-icon mtn-btn--skin-white mtn-btn--square-icon-desktop mr-8">
                <img src="<?php echo $values->topic->imageUrl; ?>" alt="<?php echo $values->topic->name .' '.$len; ?> " class="w-100" style="height: 50px;">
                <span class="btn-text font-weight-bolder btn-top"><?php echo wordwrap($values->topic->name, 7, "<br />\n");  ?></span>
              </button> -->
              <?php //}} ?>

  </main>
  
  <?php include_once('footer.php');?>