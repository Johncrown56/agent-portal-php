<?php include_once('header.php');
include_once('aside.php');
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

    <div class="w-75">
      <?php include_once('search-component.php'); ?>
    </div>

    <div>
      <!-- Article -->
      <?php
      if (isset($_POST['sendSuggestion'])) {
        $suggestion_fullName = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING);
        $suggestion_description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $suggestion_comment =  filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
        $suggestion_attachment = !empty($_FILES) ? $_FILES['file']['tmp_name'] : '';

        $api = 'suggestion';
        $method = 'POST';
        $param = array(
          'portalId' => $portalId,
          'usertype' => $userType,
          '$lang' => $lang,
          'article.name' => $suggestion_fullName,
          'article.description' => $suggestion_description,
          'article.content' => $suggestion_comment,
          'article.attachment' => $suggestion_attachment
        );
        //  echo  $params = 'portalId=' . $portalId . '&data=' . json_encode($param);
        $params = http_build_query($param);
        $response = CallAPI($method, $api, $params);
        //var_dump($response);
        if ($response->callInfo->status == 'error') {
          $errorMsg = ucfirst($response->callInfo->status) . ': '. $response->callInfo->message;
          echo showToast($errorMsg, 'danger');
        } else {
          $errorMsg = ucfirst($response->callInfo->status) . ': Thank you for your suggestion. It has been sent Successfully.';
          echo showToast($errorMsg, 'success');
          unset($_POST);
        }
      }
      ?>
      <div class="card card-bordered mt-5 p-4 p-md-7">
        <!-- Suggestion Form Section -->
        <form class="row js-validate" id="suggestionForm" method="POST" action="" enctype="multipart/form-data">
          <!-- Title -->
          <div class="w-md-80 w-lg-80 text-center mx-md-auto mb-5 mb-md-5">
            <h5>Send a Suggestion</h5>
            <p>Please enter a short name and optional description for your suggestion.</p>
          </div>
          <!-- End Title -->
          <div class="col-lg-12">
            <!-- Input -->
            <div class="js-form-message mb-4 mb-md-6">
              <label class="input-label">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="fullName" placeholder="John Doe" aria-label="John Doe" required data-msg="Please enter your full name.">
            </div>
            <!-- End Input -->

            <!-- Input -->
            <div class="js-form-message mb-4 mb-md-6">
              <label class="input-label">Description <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="description" placeholder="" aria-label="description" required data-msg="Please enter description.">
            </div>
            <!-- End Input -->


            <!-- Input -->
            <div class="js-form-message mb-4 mb-md-6">
              <label class="input-label">Please type your suggestion below <span class="text-danger">*</span></label>
              <!-- Quill -->
              <div class="quill-custom">
                <div class="js-quill" id="quillArea" style="min-height: 15rem;" data-hs-quill-options='{
       "placeholder": "Type your message...",
        "modules": {
          "toolbar": [
            ["bold", "italic", "underline", "strike", "link", "image", "blockquote", {"list": "bullet"}]
          ]
        }
       }'>
                </div>
              </div>
              <!-- End Quill -->
              <textarea name="comment" style="display:none" id="textArea"></textarea>


            </div>
            <!-- End Input -->


            <div class="js-form-message mb-4 mb-md-6">
              <label class="input-label">Add Attachment </label>
              <div class="custom-file">
                <input type="file" name="file" class="js-file-attach custom-file-input" id="fileAttachment" data-hs-file-attach-options='{
              "textTarget": "[for=\"fileAttachment\"]"
           }'>
                <label class="custom-file-label" for="fileAttachment">Add Attachment</label>
              </div>
            </div>



            <div class="text-center">
              <div class="mb-2">
                <button type="submit" name="sendSuggestion" class="btn btn-sm btn-soft-primary btn-wide">Suggest</button>
              </div>
            </div>
          </div>
        </form>
        <!-- End suggestion Form Section -->


      </div>
      <!-- End Article -->
      <?php //include_once('send-suggestion-component.php'); 
      ?>
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