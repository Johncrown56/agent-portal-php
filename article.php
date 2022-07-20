<?php include_once('header.php');
$articleId = $_GET['aid'];
include_once('aside.php');
?>

<?php
if (isset($_POST['shareArticle'])) {
  $shareName = filter_var($_POST['shareName'], FILTER_SANITIZE_STRING);
  $shareEmail = filter_var($_POST['shareEmail'], FILTER_SANITIZE_EMAIL);
  $shareFriendName =  filter_var($_POST['shareFriendName'], FILTER_SANITIZE_STRING);
  $shareFriendEmail = filter_var($_POST['shareFriendEmail'], FILTER_SANITIZE_STRING);
  $shareComment = filter_var($_POST['shareComment'], FILTER_SANITIZE_STRING);

  $api = 'email';
  $method = 'POST';
  $params = array(
    'fromEmail' => $shareEmail,
    'toEmail' => $shareFriendEmail,
    'toName' => $shareFriendName,
    'fromName' => $shareName,
    'message' => $shareComment,
    'articleId' => $articleId
  );
  $parame = 'portalId=' . $portalId . '&data=' . json_encode($params);
  $searchResults = CallAPI($method, $api, $parame);
  if ($searchResults->callInfo->status == 'success') {
    //var_dump($searchResults);
    $errorMsg = $searchResults->callInfo->status . ' ' . $searchResults->callInfo->httpStatus . ': Article shared successfully';
    echo showToast($errorMsg, 'success');
    unset($_POST);
  } else {
    $errorMsg = $searchResults->callInfo->status . ' ' . $searchResults->callInfo->httpStatus . ': ' . $searchResults->callInfo->message;
    echo showToast($errorMsg, 'danger');
  }
}
?>


<main id="content" role="main" class="main splitted-content-main">
  <!-- Fluid Content -->
  <div class="splitted-content-fluid content-space mt-9 ml-3">
    <!-- Toggles -->
    <div class="d-flex justify-content-end">
      <ul class="list-inline">
        <li class="list-inline-item">
          <!-- Small Content Toggle -->
          <a class="js-hs-unfold-invoker splitted-content-toggle btn btn-icon btn-sm btn-ghost-secondary" href="javascript:;" data-toggle="tooltip" data-placement="right" title="Secondary sidebar" data-hs-unfold-options='{
                "target": "#splittedContentSmall",
                "type": "css-animation",
                "animationIn": "fadeInLeft",
                "animationOut": "fadeOutLeft",
                "hasOverlay": true,
                "smartPositionOff": true
               }'>
            <i class="tio-format-points"></i>
          </a>
          <!-- End Small Content Toggle -->
        </li>

        <li class="list-inline-item">
          <!-- Navbar Vertical Toggle -->
          <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-sm btn-ghost-secondary">
            <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip" data-placement="right" title="Collapse"></i>
            <i class="tio-last-page navbar-vertical-aside-toggle-full-align" data-toggle="tooltip" data-placement="right" title="Expand"></i>
          </button>
          <!-- End Navbar Vertical Toggle -->
        </li>
      </ul>
    </div>
    <!-- End Toggles -->

    <div>
      <?php include_once('inner-article.php'); ?>
    </div>

    <div class="mt-8">
      <?php include_once('related-articles.php'); ?>
    </div>


  </div>
  <!-- End Fluid Content -->

  <!-- Small Content -->
  <div id="splittedContentSmall" class="hs-unfold-content splitted-content-small splitted-content-bordered d-flex flex-column mt-15">
    <div class="pr-lg-4">
      <?php include_once('trending.php'); ?>
    </div>
  </div>
  <!-- End Small Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->

<?php include_once('footer.php'); ?>