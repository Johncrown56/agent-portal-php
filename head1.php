<header id="header" class="header header-sticky-top-lg left-aligned-navbar header-white-nav-links-lg" data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
          }'>
    <div class="header-section">
        <div id="logoAndNav" class="container">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-lg">
                <!-- Logo -->
                <a class="navbar-brand" href="./" aria-label="Front">
                    <img src="./assets/svg/logos/mtn-logo.svg" alt="Logo" width="45px" height="40px">
                </a>
                <!-- End Logo -->

                <!-- Secondary Content -->
                <div class="navbar-nav-wrap-content text-center">
                    <div class="d-none d-lg-block">
                        <!-- <a class="btn btn-sm btn-light transition-3d-hover" href="" target="_blank">Buy Now</a> -->
                        <!-- Toggle Switch -->
                        <div class="d-flex justify-content-center align-items-center mt-3 mb-3">
                            <span class="font-size-1 text-dark">HIP View</span>
                            <label class="toggle-switch mx-2 toggle-switch-sm" for="customSwitch">
                                <input type="checkbox" class="js-toggle-switch toggle-switch-input is-blue" id="customSwitch"  
                                <?php checkTurboUrl('onclick="window.location.href=\'./\'" checked', 'onclick="window.location.href=\'turbo\'" unchecked'); ?>>
                                <span class="toggle-switch-label">
                                    <span class="toggle-switch-indicator"></span>
                                </span>
                            </label>
                            <span class="font-size-1 text-dark">Turbo View</span>
                        </div>
                        <!-- End Toggle Switch -->
                    </div>
                </div>
                <!-- End Secondary Content -->

                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn btn-icon btn-sm rounded-circle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span class="navbar-toggler-default">
                        <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z" />
                        </svg>
                    </span>
                    <span class="navbar-toggler-toggled">
                        <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                        </svg>
                    </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse navbar-nav-wrap-collapse">
                    <div class="navbar-body header-abs-top-inner">
                        <ul class="navbar-nav">
                            <!-- Home -->
                            <li class="hs-has-mega-menu navbar-nav-item">
                                <span id="homeMegaMenu" class="text-dark" aria-haspopup="true" aria-expanded="false">Welcome,
                                    <?php 
                                    
                                    if(isset($_SESSION['isAuthenticated'])) //|| $_SESSION['isAuthenticated'] == TRUE )
                                    {
                                        $customerApi = 'customer/'.$_SESSION['contactPersonId'];
                                        $methd = 'GET';
                                        $parameters = array(
                                            'contactPersonId' => $_SESSION['contactPersonId'],
                                        );

                                        $userDetails = CallAPI($methd, $customerApi, $parameters);
                                        //var_dump($userDetails);
                                    }
                                    if(isset($userDetails->customer[0]->customerId)){
                                    ?>                                    
                                <b class="text-dark font-weight-bold"><?php echo $userDetails->customer[0]->firstName .' '. $userDetails->customer[0]->lastName;?></b>
                                <?php } else {?>
                                    <b class="text-dark font-weight-bold">Guest</b>
                                    <?php } ?>
                                    <b class="text-white"> &nbsp; | &nbsp;</b>
                                </span>
                            </li>
                            <!-- End Home -->

                            <!-- Home -->
                            <li class="hs-has-mega-menu navbar-nav-item">
                               <?php if(isset($userDetails->customer[0]->customerId)) { ?>
                                <a id="homeMegaMenu" class="text-black" href="logout" aria-haspopup="true" aria-expanded="false"> Logout</a>
                                <?php } else { ?>
                                <a id="homeMegaMenu" class="text-black" href="login" aria-haspopup="true" aria-expanded="false"> Sign in</a>
                                <?php } ?>
                            </li>
                            <!-- End Home -->


                        </ul>
                    </div>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
    <?php
if(XEGAINSESSIONID !== null){
$getAgentbirthdays = file_get_contents('./assets/json/ison.json');
$resp = json_decode($getAgentbirthdays, true);
?>
    <div class="header-section <?php checkTurboUrl("bg-mtn-soft-yellow", "bg-dark");?>">
        <marquee class="<?php checkTurboUrl('text-dark', 'text-white'); ?> font-weight-bolder mt-2 mb-2">
            Happy Birthday to all <?php echo date('F'); ?> celebrants: 
            <?php
        foreach ($resp as $ky => $vals) {
            $e_code = $vals['eCode'];
            $name = $vals['name'];
            $dob = $vals['dob'];
            $text = $vals['gender'];
            $phone = $vals['phone'];
            $department = $vals['department'];
            $location = $vals['location'];
            $month = $vals['month'];
            $name = strtolower($name);
        ?>

        <?php if(date('F') == $month){ echo ucwords($name).';'; } ?>

        <?php } ?>
        <span class="<?php if(date('F') == $month){ echo count($resp); } ?>">lots of love from all of us at MTN.</span>
            <!-- <a href="javascript:;"><span class="badge badge-primary text-dark badge-pill ml-2">see more</span></a> -->
        </marquee>
    </div>
    <?php } ?>
</header>
<!-- ========== END HEADER ========== -->