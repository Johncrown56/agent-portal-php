<?php include_once('header.php');

if(isset($_POST['login'])){
    
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
                
               $username = stripslashes($_POST['username']);
               $password = stripslashes($_POST['password']);
            
               if(!empty($username) && !empty($password)){
                $api = 'authenticate/login';
                $method = 'POST';
                $params = array(
                    'portalId'=>$portalId,
                    'usertype'=> $userType,
                    'username' => $username,
                    'password' => $password,
                    'forceLogin' => 'yes',
                    '$lang' => 'en-us'
                );
            
                //echo $parame = 'portalId='.$portalId.'&data='.json_encode($params);
                               //'portalId=200100000001034&usertype=agent&username=egainsso&password=Welcome12&%24lang=en-us'/
                //echo $parame = 'portalId='.$portalId.'&usertype=agent&username=egainsso&password=Welcome12&%24lang=en-us';
                $response = CallAPI($method, $api, http_build_query($params));
                // if($response){
                // var_dump($response);
                // } else {
                //   echo "No response";
                // }
            
                if ($response->callInfo->status == 'success') {          
                  $msg = ucfirst($response->callInfo->status). ': Login is successful';
                  echo showToast($msg, 'success');      
                  $_SESSION['userId'] = $response->authInfo->userId;
                  $_SESSION['contactPersonId'] = $response->authInfo->contactPersonId;
                  $_SESSION['isAuthenticated'] = $response->authInfo->isAuthenticated;
                  $_SESSION['authCode'] = $response->authInfo->authCode;
                  $_SESSION['authToken'] = $response->authInfo->authToken;
                  unset($_POST);
                   echo "<script>setTimeout(\"location.href = './';\",1000);</script>";
            
                   //header('location: ./'); 
                  } else {
                    $msg = ucfirst($response->callInfo->status) . ': '.$response->callInfo->message;
                    echo showToast($msg, 'danger');
                  } 
               } else {
                 $msg = "Username or Password cannot be empty";
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
    <!-- Login Form -->
    <div class="container space-2 space-lg-3">
      <form class="js-validate w-md-75 w-lg-50 mx-md-auto" method="POST">
        <!-- Title -->
        <div class="mb-5 mb-md-7 ">
          <h1 class="h2 mb-0">Welcome back</h1>
          <p>Login to manage your account.</p>
        </div>
        <!-- End Title -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="userName">Username</label>
          <input type="text" class="form-control" name="username" id="userName" placeholder="username" aria-label="userName" autocomplete="off" required
                 data-msg="Please enter your username">
        </div>
        <!-- End Form Group -->

        <!-- Form Group -->
        <div class="js-form-message form-group">
          <label class="input-label" for="signinSrPassword">
            <span class="d-flex justify-content-between align-items-center">
              Password
              <a class="link-underline text-capitalize font-weight-normal" href="forgot-password">Forgot Password?</a>
            </span>
          </label>
          <input type="password" class="form-control" name="password" id="signinSrPassword" placeholder="********" aria-label="********" autocomplete="off" required
                 data-msg="Your password is invalid. Please try again.">
        </div>
        <!-- End Form Group -->
        
        <input type="hidden" id="token" name="token">

        <!-- Button -->
        <div class="row align-items-center mb-5">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <span class="font-size-1 text-muted">Don't have an account?</span>
            <a class="font-size-1 font-weight-bold" href="register">Register</a>
          </div>

          <div class="col-sm-6 text-sm-center">
            <button type="submit" name="login" class="btn btn-primary transition-3d-hover">Login</button>
          </div>
        </div>
        <!-- End Button -->
      </form>
    </div>
    <!-- End Login Form -->
  </main>
  <!-- ========== END MAIN ========== -->

  <?php include_once('footer.php');?>