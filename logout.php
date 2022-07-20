<?php ob_start();
if (!session_start()){
    session_start();
}

include_once('variables.php');

if(!empty($_SESSION)){
    if(!empty($_SESSION['contactPersonId'])){
    $api = 'authenticate/logout';
    $method = 'POST';
    $params = array(
        '$lang' => 'en-us'
    );

    $response = CallAPI($method, $api, http_build_query($params));
    var_dump($response);
    if ($response->callInfo->status == 'error') {   
        $errorMsg = ucfirst($response->callInfo->status) . ': '.$response->callInfo->message;
        echo showToast($errorMsg, 'danger');
      } else {
        $errorMsg = ucfirst($response->callInfo->status). ': Logout is successful';
        echo showToast($errorMsg, 'success');
        unset($_SESSION['userId']);
        unset($_SESSION['contactPersonId']);
        unset($_SESSION['isAuthenticated']);
        unset($_SESSION['authCode']);
        unset($_SESSION['authToken']);
        session_destroy();
        // header('location: ./');
        
        echo "<script>setTimeout(\"location.href = './';\",3000);</script>";
      }  
    } else {
    
    $api = 'authenticate/terminateSession/'.$xEgainSessionId;
    $method = 'POST';
    $params = array(
        '$lang' => 'en-us',
        'wsid'=> $xEgainSessionId
    );

    $response = CallAPI($method, $api, http_build_query($params));
    //var_dump($response);
    if ($response->callInfo->status == 'error') {   
        $errorMsg = ucfirst($response->callInfo->status) . ': '.$response->callInfo->message;
        echo showToast($errorMsg, 'danger');
      } else {
        $errorMsg = ucfirst($response->callInfo->status). ': Logout is successful';
        echo showToast($errorMsg, 'success');
        //header('location: ./');
        echo "<script>setTimeout(\"location.href = './';\",3000);</script>";
      }
}

}else {
    header('location: ./');
}
?>