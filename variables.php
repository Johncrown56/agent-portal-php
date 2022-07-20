<?php ob_start();
if (!session_start()){
    session_start();
}

ini_set('display_errors', 0);
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: ./devices');

// if($_SESSION['authToken'] == null){
// header('Location: ./login');
// }

// if(empty($_SESSION)){
//   header("Location: ./login");
// }

$siteKey = "6LezcIAdAAAAAK7C1z1p2Hmf2ZAXXaJlY3wnIMoR"; 
$secretKey = "6LezcIAdAAAAAAbfVjveDCI8DzXdOzMcF3lzikpg";


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header('Location: ./login');
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


// if (!isset($_SESSION['CREATED'])) {
//         $_SESSION['CREATED'] = time();
//     } else if (time() - $_SESSION['CREATED'] > 1800) {
//         // session started more than 30 minutes ago
//         //session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
//         header('Location: ./');
//         $_SESSION['CREATED'] = time();  // update creation time
//     }



$articleDir = "content";
$zigiUrl = "https://mtnng-prod.voiceweb.eu/bm/demo/web/chatbot/?channel=weblocale&=en&msisdn=&v=5#/chatbot";
//$portalId = "200100000001038"; // test agent portal id
$portalId = "200100000001034"; //production portal id
$mtnAcademyTopicId = "200100000013653";
$userType= isset($_SESSION['loginMode']) ? $_SESSION['loginMode'] : "customer";
$level = '$level';
$lang = 'en-US';
$domain = "https://mtnnigeria.egain.cloud";
define("DOMAIN", "$domain");
define("PORTALID", "$portalId");
define("SITEURL", "$domain/system/ws/v11/ss/");
define("PORTALPARAMS", "?portalId=$portalId&usertype=$userType&");


// function for calling anonymous session.
function createAnonymousSession(){
$head = array('Accept: application/json', 'Accept-Language: en-us');
$url = DOMAIN."/system/ws/v15/ss/portal/".PORTALID."/authentication/anonymous";
$ch = curl_init();
// set url
curl_setopt($ch, CURLOPT_URL, $url);
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//enable headers
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//get only headers
curl_setopt($ch, CURLOPT_NOBODY, 1);
// $output contains the output string
$output = curl_exec($ch);
// close curl resource to free up system resources
//curl_close($ch);
$headers = [];
$output = rtrim($output);
$data = explode("\n",$output);
$headers['status'] = $data[0];
$eGainSess = $data[11];
array_shift($data);

foreach($data as $part){
    $middle = explode(":",$part,2);
    //Supress warning message if $middle[1] does not exist.
    if ( !isset($middle[1]) ) { $middle[1] = null; }
    $headers[trim($middle[0])] = trim($middle[1]);
}
//echo $headers['X-egain-session'];
$xEgainSessionId = $headers['X-egain-session'];
return ($xEgainSessionId);
}


// $xEgainSessionId = createAnonymousSession();
// define("XEGAINSESSIONID", $xEgainSessionId);
if(isset($_SESSION['authToken'])){
$xEgainSessionId = $_SESSION['authToken'];
define("XEGAINSESSIONID", $xEgainSessionId);
} else {
    define("XEGAINSESSIONID", null);
}
//define("XEGAINSESSIONID", "4d7fb3a2-06cf-4c49-99d0-41d2f38a1273");


function CallAPI($method, $api, $params) {
   // $egainSession = XEGAINSESSIONID !== null ? 'X-egain-session: d7f3138d-aceb-4ee5-b869-62fd8f6e70d2' : '';
   if(XEGAINSESSIONID !== null || basename($_SERVER['PHP_SELF']) =='register.php' || basename($_SERVER['PHP_SELF']) == 'forgot-password.php' || basename($_SERVER['PHP_SELF']) =='login.php' 
    ){
    $egainSessionId = "X-egain-session: ".XEGAINSESSIONID."";
    $egainSession = basename($_SERVER['PHP_SELF']) =='register.php' || basename($_SERVER['PHP_SELF']) == 'forgot-password.php' || basename($_SERVER['PHP_SELF']) =='login.php'
     ? '': $egainSessionId;
    $headers = array("Accept: application/json", "Content-Type: application/json", "$egainSession" );
     //$headers = array('Accept: application/json', 'Content-Type: application/json' );
     //var_dump($headers);
     $par = $method == "GET" ? http_build_query($params) : $params;
    //  echo $url = $method == "GET" ? SITEURL. $api. PORTALPARAMS.$par : SITEURL. $api. PORTALPARAMS;
     $url = SITEURL. $api. PORTALPARAMS.$par;
     $url = $api == 'search/start' ? str_replace("/ss/","/gh/", $url) : $url;    
     $curl = curl_init($url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
 
     switch ($method) {
         case "GET":
             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
             break;
         case "POST":
             curl_setopt($curl, CURLOPT_POSTFIELDS, $par);
             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
             break;
         case "PUT":
             curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
             break;
         case "DELETE":
             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
             curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
             break;
     }
     $response = curl_exec($curl);
     $data = json_decode($response);
 
     /* Check for 404 (file not found). */
     $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
     // Check the HTTP Status code
     switch ($httpCode) {
         case 200:
             //$response_message = "200: Success";
             // return ($data);
             break;
        case 401:
                $response_message = "Error: Login token expired. please login again";
                header('location: https://'. $_SERVER['HTTP_HOST'].'/agent/login');
            break;
         case 404:
             $response_message = "404: API Not found";
             break;
         case 500:
             $response_message = "500: servers replied with an error.";
             break;
         case 502:
             $response_message = "502: servers may be down or being upgraded.";
             break;
         case 503:
             $response_message = "503: service unavailable.";
             break;
         default:
             $response_message = "Error: " . $httpCode . " : " . curl_error($curl);
             break;
     }
     curl_close($curl);
     if (isset($response_message)){
         //echo $response_message;
         echo showToast($response_message, 'danger');
     }
     return ($data);
     //die;
   } else {
    // $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
    // $domainLink = $protocol . '://' . $_SERVER['HTTP_HOST'];
    //header('Location: ./login');
    //header('Location: '.$domainLink.'/agent-portal/login');
    header('location: https://'. $_SERVER['HTTP_HOST'].'/agent/login');
    //echo "<meta http-equiv='refresh' content='0;url=https://172.16.9.117/agent-portal/login'>";
   }

}


//https://www.googleapis.com/youtube/v3/playlists?part=contentDetails&key=AIzaSyDoWZTJPpMXgP1ZZFUbXiLKd3mEKFo5fKQ&maxResults=10&channelId=UCZKlshRTh3H4pRXa4N6458A

define('YOUTUBEURL', 'https://www.googleapis.com/youtube/v3/');
define('KEY', 'AIzaSyDoWZTJPpMXgP1ZZFUbXiLKd3mEKFo5fKQ');
define('CHANNELID', 'UCZKlshRTh3H4pRXa4N6458A');
define('CHANNELPLAYLISTID', 'UUZKlshRTh3H4pRXa4N6458A');
//The difference between CHANNELID and CHANNELPLAYLISTID is the second letter C which is changed to U

function callYoutubeAPI($met, $api, $options){
    if(XEGAINSESSIONID !== null){   
    $par = KEY.'&'.http_build_query($options);
    $url = YOUTUBEURL. $api.'?key='.$par;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    switch ($met) {
        case "GET":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            break;
        case "POST":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($options));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            break;
    }
    $response = curl_exec($curl);
    $data = json_decode($response);

    /* Check for 404 (file not found). */
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    // Check the HTTP Status code
    switch ($httpCode) {
        case 200:
            $response_message = "200: Success";
            //var_dump($data);
            return ($data);
            break;
        case 404:
            $response_message = "404: API Not found";
            break;
        case 500:
            $response_message = "500: servers replied with an error.";
            break;
        case 502:
            $response_message = "502: servers may be down or being upgraded.";
            break;
        case 503:
            $response_message = "503: service unavailable. ";
            break;
        default:
            $response_message = "Unknown error: " . $httpCode . " : " . curl_error($curl);
            break;
    }
    curl_close($curl);
    //echo $response_message;
    //die;
    } else {
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
    $domainLink = $protocol . '://' . $_SERVER['HTTP_HOST'];
    //header('location: '.$domainLink.'/agent-portal/login'); 
    header('location: https://'. $_SERVER['HTTP_HOST'].'/agent-portal/login');
    // header('location: https://172.19.6.117/agent-portal/login'); 
}
}

function clean_and_hyphenate($string) {

    $string=trim($string);
    $string=strtolower($string);
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.    
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }

    function str_limit($value, $limit = 100, $end = '...'){
    $limit = $limit - mb_strlen($end); // Take into account $end string into the limit
    $valuelen = mb_strlen($value);
    return $limit < $valuelen ? mb_substr($value, 0, mb_strrpos($value, ' ', $limit - $valuelen)) . $end : $value;
}

function checkTurboUrl($str1, $str2){
    if(basename($_SERVER['PHP_SELF']) == 'turbo.php'
    || basename($_SERVER['PHP_SELF']) == 'experience-center.php'
    || basename($_SERVER['PHP_SELF']) == 'e_centre-search.php'
    || basename($_SERVER['PHP_SELF']) == 'video.php'
    || basename($_SERVER['PHP_SELF']) == 'mtn-academy.php'
    ){ 
        echo $str1; 
    } else { 
    echo $str2;
}

}

function checkHomeUrl($str1, $str2){
    if (basename($_SERVER['PHP_SELF'])  == '' 
    || basename($_SERVER['PHP_SELF']) == 'index.php'
    ) {
        echo $str1;
      } else {
        echo $str2;
      } 
}

function split_on($string, $num) {
    $length = strlen($string);
    $output[0] = substr($string, 0, $num);
    $output[1] = substr($string, $num, $length );
    return $output;
}

function limitWord($strg, $num){
    $pos = strpos($strg, ' ', $num);
    $output = substr($strg, 0, $pos);
    $length = strlen($output);
    return $output = ($num < $length) ? $output.'...' : $output;

    // $pos = strpos($value->contentText, ' ', 200);
            // $contentText = substr($value->contentText,0,$pos);
            // $length = strlen($contentText);
            // $contentText = (200 < $length) ? $contentText.'...' : $contentText;
    //return $output;
}

function rip_tags($string) {
   
    // ----- remove HTML TAGs -----
    $string = preg_replace ('/<[^>]*>/', ' ', $string);
   
    // ----- remove control characters -----
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
   
    // ----- remove multiple spaces -----
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
   
    return $string;

}

function showToast($message, $color){
    return '<div id="showToast" class="showToast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 20px; right: 20px; max-width: 400px; z-index: 9999;">
    <div class="toast-header alert-'.$color.'" style="border-radius: 5px;">
      <span class="mb-0 text-white font-size-40">'.$message.' </span>
      <button type="button" class="close ml-3" data-dismiss="toast" aria-label="Close">
        <i class="fas fa-times text-white font-size-40" aria-hidden="true"></i>
      </button>
    </div>
  </div>';
}

function passImg($playId){
    if($playId == 'PLqHXrPnpTEgyLNq4d628dAe60W_SR3CED'){
        $img = './assets/svg/mtn/hynet.png';
    } else if($playId == 'PLqHXrPnpTEgwGHqqMz4rznYU4ixnHMDUH'){
        $img = './assets/svg/mtn/smart-feature-phone-black-front.png';
    } else if($playId == 'PLqHXrPnpTEgxT0Y4yLbdu28iKgw3LjmcP'){
        $img = './assets/svg/mtn/Hynetflex.png';
    }else if($playId == 'PLqHXrPnpTEgyd9_oaNbiZomZjv_Doo4XQ'){
        $img = './assets/svg/mtn/android.png';
    }else if($playId == 'PLqHXrPnpTEgzk6q-S8qov7UiAIO0upuDf'){
        $img = './assets/svg/mtn/apple_logo.png';
    }else if($playId == 'PLqHXrPnpTEgxNjig6ywmiJpS4S54hjlAx'){
        $img = './assets/svg/mtn/eSIM.png';
    }else {
        $img = './assets/svg/mtn/eSIM.png';
    }
    return $img;
}

function restyle_text($input){
    $input = number_format($input);
    $input_count = substr_count($input, ',');
    if($input_count != '0'){
        if($input_count == '1'){
            return substr($input, 0, -4).'K';
        } else if($input_count == '2'){
            return substr($input, 0, -8).'M';
        } else if($input_count == '3'){
            return substr($input, 0,  -12).'B';
        } else {
            return;
        }
    } else {
        return $input;
    }
}

function change_time_format($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>