<?php include_once('header.php');

if(isset($_POST['register'])){
        $url = "https://www.google.com/recaptcha/api/siteverify";
            $data = [
                    'secret' => $secretKey,
                    'response' => $_POST['token'],
                    'remoteip' => $_SERVER['REMOTE_ADDR'],
            ];
            
            $options = array(
            'http' => array(
            'header' => "content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
            )
            );
            
            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            $res = json_decode($response, true);
            if($res['success'] == true) {
                
                $firstName = stripslashes($_POST['firstName']);
                $lastName = stripslashes($_POST['lastName']);
                $username = stripslashes($_POST['username']);
                $email = stripslashes($_POST['email']);
                
                if(!empty($firstName) && !empty($lastName) && !empty($username) && !empty($email)){
                $emailSuffix = substr($email, strpos($email, '@'));
                if($emailSuffix == "@mtn.com" || $emailSuffix == "@isonxperiences.com" ||  $emailSuffix == "@avante-cs.com" || $emailSuffix == "@avantesoft.com"){
                $api = 'customer';
                $method = 'POST';
                $params = array(
                'loginId' => $username,
                'firstName'=>$firstName,
                'lastName'=> $lastName,    
                'emailAddress' => $email
                );
                
                echo $parameters = 'portalId='.$portalId.'&usertype='.$userType.'&data='.json_encode($params);
                
                //echo $parame = 'portalId='.$portalId.'&data='.json_encode($params);
                //echo http_build_query($params);
                //'portalId=200100000001034&usertype=agent&username=egainsso&password=Welcome12&%24lang=en-us'/
                //echo $parame = 'portalId='.$portalId.'&usertype=agent&username=egainsso&password=Welcome12&%24lang=en-us';
                $response = CallAPI($method, $api, $parameters);
                // var_dump($response);
                
                if ($response->callInfo->status == 'success') {        
                $msg = ucfirst($response->callInfo->status). ': Registration is successful. Please check your email for login details.';
                echo showToast($msg, 'success');
                unset($_POST);
                echo "<script>setTimeout(\"location.href = 'login';\",5000);</script>";
                
                // header('location: ./login');
                } else {
                $msg = ucfirst($response->callInfo->status) . ' ' .strstr($response->callInfo->message, ':');
                echo showToast($msg, 'danger');
                }
                
                }else {
                $msg = "Error: Access Denied";
                echo showToast($msg, 'danger');
                }
                
                } else {
                $msg = "Please fill all empty fields";
                echo showToast($msg, 'danger');
                }
            } else {
                unset($_POST);
                       $msg = "Recaptcha is invalid. Please refresh and try again.";
                        echo showToast($msg, 'danger'); 
                    }


}

?>

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Register Form -->
<div class="container space-2 space-lg-2">
  <div class="row no-gutters">
    <div class="col-md-8 col-lg-7 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 space-2">
      <!-- Form -->
      <form class="js-validate" method="POST">
        <!-- Title -->
        <div class="mb-5 mb-md-7 text-center">
          <h1 class="h2">Welcome to CR <span class="font-italic">HIP</span> Portal</h1>
          <p>Fill out the form to get started.</p>
        </div>
        <!-- End Title -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="FirstName">First Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="firstName" id="FirstName" placeholder="" aria-label="First Name" required autocomplete="off" data-msg="Please enter your first name">
        </div>
        <!-- End Form Group -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="LastName">Last Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="lastName" id="LastName" placeholder="" aria-label="Last Name" required autocomplete="off" data-msg="Please enter your last name">
        </div>
        <!-- End Form Group -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="userName">Username <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="username" id="userName" placeholder="" aria-label="User Name" required autocomplete="off" data-msg="Please enter your preferred Username">
        </div>
        <!-- End Form Group -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="emailAddress">Email address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" id="emailAddress" placeholder="e.g john.doe@mtn.com" aria-label="Email address" required autocomplete="off" data-msg="Please enter a valid email address.">
        </div>
        <!-- End Form Group -->
        
        <input type="hidden" id="token" name="token">

        <!-- Checkbox -->
        <!-- <div class="js-form-message mb-5">
          <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
            <input type="checkbox" class="custom-control-input" id="termsCheckboxExample2" name="termsCheckboxExample2" required
                   data-msg="Please accept our Terms and Conditions.">
            <label class="custom-control-label" for="termsCheckboxExample2">
              <small>
                I agree to the
                <a class="link-underline" href="#">Terms and Conditions</a>
              </small>
            </label>
          </div>
        </div> -->
        <!-- End Checkbox -->

        <!-- Button -->
        <div class="row align-items-center mb-5">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <span class="font-size-1 text-muted">Already have an account?</span>
            <a class="font-size-1 font-weight-bold" href="login">Login</a>
          </div>

          <div class="col-sm-6 text-sm-right">
            <button type="submit" name="register" class="btn btn-primary transition-3d-hover">Register</button>
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