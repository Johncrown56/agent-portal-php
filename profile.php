<?php include_once('header.php');
$topicId = $_GET['topicId'];
include_once('aside.php');
if(isset($_SESSION['isAuthenticated'])){
    $customerApi = 'customer/'.$_SESSION['contactPersonId'];
    $getUsermethod = 'GET';
    $parameters = array(
        'contactPersonId' => $_SESSION['contactPersonId'],
    );

    $userDetails = CallAPI($getUsermethod, $customerApi, $parameters);
    //var_dump($userDetails);
    if(isset($userDetails->customer[0]->customerId)){
       $userFirstName = $userDetails->customer[0]->firstName;
       $userLastName = $userDetails->customer[0]->lastName;
       $userUserName = $userDetails->customer[0]->loginId;
       $userEmailAddress = $userDetails->customer[0]->emailAddress;
       $contactPersonId = $userDetails->customer[0]->contactPersonId;
    }
}


if (isset($_POST['updateProfile'])) {

    $firstName = stripslashes($_POST['firstName']);
    $lastName = stripslashes($_POST['lastName']);
    $username = stripslashes($_POST['username']);
    $email = stripslashes($_POST['email']);

    if (!empty($firstName) && !empty($lastName) && !empty($username) && !empty($email)) {
        $emailSuffix = substr($email, strpos($email, '@'));
        if ($emailSuffix == "@mtn.com" || $emailSuffix == "@isonxperiences.com" ||  $emailSuffix == "@avante-cs.com" || $emailSuffix == "@avantesoft.com") {
            $api = 'customer';
            $method = 'PUT';
            $params = array(
                'contactPersonId' => $contactPersonId,
                'loginId' => $username,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'emailAddress' => $email
            );

            echo $parameters = 'portalId=' . $portalId . '&usertype=' . $userType . '&data=' . json_encode($params);
            $response = CallAPI($method, $api, $parameters);

            if ($response->callInfo->status == 'success') {
                $msg = ucfirst($response->callInfo->status) . ': Update is successful.';
                echo showToast($msg, 'success');
                unset($_POST);

                // header('location: ./login');
            } else {
                $msg = ucfirst($response->callInfo->status) . ' ' . strstr($response->callInfo->message, ':');
                echo showToast($msg, 'danger');
            }
        } else {
            $msg = "Error: Access Denied";
            echo showToast($msg, 'danger');
        }
    } else {
        $msg = "Please fill all empty fields";
        echo showToast($msg, 'danger');
    }
}

if (isset($_POST['changePassword'])) {

    $currentPassword = stripslashes($_POST['currentPassword']);
    $newPassword = stripslashes($_POST['newPassword']);
    $confirmNewPassword = stripslashes($_POST['confirmNewPassword']);

    if (!empty($currentPassword) && !empty($newPassword) && !empty($confirmNewPassword)) {
        if ($newPassword == $confirmNewPassword) {
            $api = 'customer';
            $method = 'PUT';
            $params = array(
                'contactPersonId' => $contactPersonId,
                'loginId' => $username,
                'password' => $newPassword,
            );

            echo $parameters = 'portalId=' . $portalId . '&usertype=' . $userType . '&data=' . json_encode($params);
            $response = CallAPI($method, $api, $parameters);

            if ($response->callInfo->status == 'success') {
                $msg = ucfirst($response->callInfo->status) . ': Password changed successfully.';
                echo showToast($msg, 'success');
                unset($_POST);

                // header('location: ./login');
            } else {
                $msg = ucfirst($response->callInfo->status) . ' ' . strstr($response->callInfo->message, ':');
                echo showToast($msg, 'danger');
            }
        } else {
            $msg = "Your password does not align.";
            echo showToast($msg, 'danger');
        }
    } else {
        $msg = "The password fields cannot be empty";
        echo showToast($msg, 'danger');
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
            <?php include_once('profile-component.php'); ?>
        </div>

        <div class="mt-8">
            <?php //include_once('new-articles.php');
            ?>
        </div>

        <div class="mt-8">
            <?php //include_once('tips-articles.php');
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