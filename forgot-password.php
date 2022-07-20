<?php include_once('header.php');

if(isset($_POST['forgot-password'])){
   $username = stripslashes($_POST['username']);

   if(!empty($username)){
    $api = 'customer/'.$username.'/password';
    $method = 'POST';
    $params = array(
        'portalId'=>$portalId,
        'usertype'=> $userType,
        'loginId' => $username,
        '$attribute'=> 'all',
        '$lang' => 'en-us'
    );
    $response = CallAPI($method, $api, http_build_query($params));
    // var_dump($response);

    if ($response->callInfo->status == 'success') {
        $msg = ucfirst($response->callInfo->status). ': Password changed successfully. Please check your email for the new password.';
        echo showToast($msg, 'success');
        unset($_POST);
        echo "<script>setTimeout(\"location.href = 'login';\",7000);</script>";       
      } else {
        $msg = ucfirst($response->callInfo->status) . ' '. strstr($response->callInfo->message, ':');
        echo showToast($msg, 'danger');
      }

   } else {
     $msg = "Username cannot be empty";
    echo showToast($msg, 'danger');
   }

}

?>

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Register Form -->
    <div class="container space-2 space-lg-3">
  <div class="row no-gutters">
    <div class="col-md-8 col-lg-7 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 space-2">
      <!-- Form -->
      <form class="js-validate" method="POST">
        <!-- Title -->
        <div class="mb-5 mb-md-7">
          <h1 class="h2">Forgot your password?</h1>
          <p>Enter your username below and we'll get you back on track.</p>
        </div>
        <!-- End Title -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="userName">Username <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="username" id="userName" placeholder="" aria-label="userName" required data-msg="Please enter your username">
        </div>
        <!-- End Form Group -->

        <!-- Button -->
        <div class="row align-items-center mb-5">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <a class="font-size-1 font-weight-bold" href="login"><i class="fas fa-angle-left fa-sm mr-1"></i> Back to sign in</a>
          </div>

          <div class="col-sm-6 text-sm-right">
            <button type="submit" name="forgot-password" class="btn btn-primary transition-3d-hover">Submit</button>
          </div>
        </div>
        <!-- End Button -->
      </form>
      <!-- End Form -->
    </div>
  </div>
</div>
    <!-- End Register Form -->
  </main>
  <!-- ========== END MAIN ========== -->

  <?php include_once('footer.php');?>