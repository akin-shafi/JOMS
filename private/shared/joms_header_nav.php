<?php include(SHARED_PATH . '/joms_header_link.php'); ?> 
<!-- BEGIN: Body-->
<?php $theme = Theme::find_theme($loggedInAdmin->id ?? ''); 
// echo $loggedInAdmin->id;
// pre_r($theme);
?>

 

<!-- <body class="horizontal-layout horizontal-menu
  <?php //echo $theme[0]->theme_layout ? Theme::LAYOUT[$theme[0]->theme_layout] : 'semi-dark-layout'; ?> 2-columns   
  <?php //if($theme[0]->footer_type == 1 ){ // hidden
    //echo 'footer-hidden';
  //} //elseif($theme[0]->footer_type == 2){ // static
    //echo 'footer-static';
  //} //elseif($theme[0]->footer_type == 3){ // sticky
    //echo 'fixed-footer';
  //}  ?>
  <?php //echo $theme[0]->collapse_sidebar ? Theme::MENU_TYPE[$theme[0]->collapse_sidebar] : 'menu-expanded'; ?> 
  <?php //echo $theme[0]->navbar_type ? Theme::NAVBAR_TYPE[$theme[0]->navbar_type] : 'navbar-sticky'; ?>" data-open="click" data-menu="horizontal-menu" data-col="2-columns" 
  data-layout="<?php //echo $theme[0]->theme_layout ? Theme::LAYOUT[$theme[0]->theme_layout] : 'semi-dark-layout'; ?>
  ">  -->

  <!-- <body class="horizontal-layout horizontal-menu content-left-sidebar chat-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar"> -->
    <!-- 
      header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow floating-nav d-none //hidden
      header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow navbar-static-top // static
      header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow fixed-top // sticky
      header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow floating-nav // floating
    
     -->
    <!-- BEGIN: Header-->
    <!-- <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-brand-center"></nav> -->
    
    <!-- <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu  navbar-light navbar-shadow navbar-fixed navbar-brand-center
    <?php //if($theme[0]->navbar_type == 1){ // hidden
      //echo 'floating-nav d-none';
    //}elseif($theme[0]->navbar_type == 2){ // static
      //echo 'navbar-static-top';
    //}elseif($theme[0]->navbar_type == 3){ // Sticky
      //echo 'fixed-top';
    //}elseif($theme[0]->navbar_type == 4){ // floating
      //echo 'floating-nav';
    //}  
    ?>
    "> -->

    <body class="horizontal-layout horizontal-menu content-left-sidebar chat-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">
    <!-- 
      header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow floating-nav d-none //hidden
      header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow navbar-static-top // static
      header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow fixed-top // sticky
      header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow floating-nav // floating
    
     -->
    <!-- BEGIN: Header-->
    <!-- <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-brand-center"> -->
  <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
  
    <div class="navbar-header d-xl-block d-none">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item"><a class="navbar-brand" href="index-2.html">
            <div class="brand-logo ">
              <?php 
                  if($loggedInAdmin->level <= 10){ ?>
                     <img class="pt-1" src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="110" />
                 <?php }else{ ?>
                   <?php if ($loggedInAdmin->level == 11){ // DDP?>
                      <img class="pt-1" src="<?php echo url_for('/images/dpp.png') ?>" width="250" />
                    <?php }elseif($loggedInAdmin->level == 12){ // Police ?>
                      <img class="pt-1" src="<?php echo url_for('/images/police.png') ?>" width="250" />
                    <?php }else{ ?>
                      <span>Nigeria Prison Service</span>
                    <?php } ?>
                 <?php } ?>

            </div>
            <!-- <span class="text-bold-600">RSJSC </span>
              <br class="clearfix">
              <small class="font-small-3">Judicial Operation Management Syst</small> -->
          </a></li>
      </ul>
    </div>
    <div class="navbar-wrapper">
      <div class="navbar-container content bg-white">
        <div class="navbar-collapse" id="navbar-mobile">
          <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav">
              <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather-menu"></i></a></li>

            </ul>
             <?php 
              if($loggedInAdmin->level <= 10){ ?>
                
                 <img class="mobile-menu d-xl-none" src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="90" />
             <?php }else{ ?>
               <?php if ($loggedInAdmin->level == 11){ // DDP?>
                <img class="mobile-menu d-xl-none" src="<?php echo url_for('/images/dpp.png') ?>" width="90" />
                <?php }elseif($loggedInAdmin->level == 12){ // Police ?>
                  <img class="mobile-menu d-xl-none" src="<?php echo url_for('/images/police.png') ?>" width="110" />
                  
                <?php }else{ ?>
                  <span>Nigeria Prison Service</span>
                <?php } ?>
             <?php } ?>
           
            <ul class="nav navbar-nav bookmark-icons">
              <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather-check-square"></i></a></li>
              <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather-message-square"></i></a></li>
              <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather-mail"></i></a></li>
              <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather-calendar"></i></a></li>
            </ul>
            <ul class="nav navbar-nav">
              <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather-star warning"></i></a>
                <div class="bookmark-input search-input">
                  <div class="bookmark-input-icon"><i class="feather-search primary"></i></div>
                  <input class="form-control input" type="text" placeholder="Search in JOMS ..." tabindex="0" data-search="template-list">
                  <ul class="search-list"></ul>
                </div>
              </li>
            </ul>
          </div>
          <ul class="nav navbar-nav float-right">

            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather-maximize"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather-search"></i></a>
              <div class="search-input">
                <div class="search-input-icon"><i class="feather-search primary"></i></div>
                <input class="input" type="text" placeholder="Search in JOMS ..." tabindex="-1" data-search="template-list">
                <div class="search-input-close"><i class="feather-x"></i></div>
                <ul class="search-list"></ul>
              </div>
            </li>
            <li class="dropdown dropdown-notification d-none nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <div class="dropdown-header m-0 p-2">
                    <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                  </div>
                </li>
                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                      <div class="media-left"><i class="feather-plus-square font-medium-5 primary"></i></div>
                      <div class="media-body">
                        <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                      </div><small>
                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                    </div>
                  </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                      <div class="media-left"><i class="feather-download-cloud font-medium-5 success"></i></div>
                      <div class="media-body">
                        <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                      </div><small>
                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                    </div>
                  </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                      <div class="media-left"><i class="feather-alert-triangle font-medium-5 danger"></i></div>
                      <div class="media-body">
                        <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                      </div><small>
                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                    </div>
                  </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                      <div class="media-left"><i class="feather-check-circle font-medium-5 info"></i></div>
                      <div class="media-body">
                        <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                      </div><small>
                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                    </div>
                  </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                      <div class="media-left"><i class="feather-file font-medium-5 warning"></i></div>
                      <div class="media-body">
                        <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                      </div><small>
                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                    </div>
                  </a></li>
                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <div class="user-nav d-sm-flex d-none">
                  <span class="user-name text-bold-600">
                    <?php if($loggedInAdmin->level <= 10 ){
                      echo $loggedInAdmin->full_name();
                    }else{
                      echo Admin::ADMIN_LEVEL[$loggedInAdmin->level];
                    } ?>
                    
                  </span>
                  <span class="user-status">
                    <?php if($loggedInAdmin->level <= 10 ){
                      echo Admin::ADMIN_LEVEL[$loggedInAdmin->level] .'('. CourtCase::COURT_DIVISION[$loggedInAdmin->court_division] . ')'; 
                      }else{
                        echo $loggedInAdmin->division . 'Division';
                      }
                      ?>
                  </span>
                </div>
                <span><img class="round" src="<?php echo url_for('images/profile.svg') ?>" alt="avatar" height="40" width="40"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="page-user-profile.html"><i class="feather-user"></i> Edit Profile</a>

                <!-- <a class="dropdown-item" href="app-email.html"><i class="feather-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="app-todo.html"><i class="feather-check-square"></i> Task</a>
                <a class="dropdown-item" href="app-chat.html"><i class="feather-message-square"></i> Chats</a>-->
                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo url_for('/high-court/logout.php') ?>"><i class="feather-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- END: Header-->


  <!-- BEGIN: Main Menu-->
  <div class="horizontal-menu-wrapper">
      <!-- <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-without-dd-arrow navbar-shadow menu-border navbar-brand-center navbar-light" role="navigation" data-menu="menu-wrapper"> -->
      <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-light navbar-without-dd-arrow navbar-shadow menu-border navbar-brand-center floating-nav" role="navigation" data-menu="menu-wrapper">
        
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index-2.html">
              <div class="brand-logo">
                <?php 
                  if($loggedInAdmin->level <= 10){ ?>
                     <img src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="110" />
                 <?php }else{ ?>
                   <?php if ($loggedInAdmin->level == 11){ // DDP?>
                      <img src="<?php echo url_for('/images/dpp.png') ?>" width="110" />
                    <?php }elseif($loggedInAdmin->level == 12){ // Police ?>
                      <img src="<?php echo url_for('/images/police.png') ?>" width="110" />
                    <?php }else{ ?>
                      <span>Nigeria Prison Service</span>
                    <?php } ?>
                 <?php } ?>
                
                
              </div>
              <!-- <h2 class="brand-text mb-0">RSJSC</h2> -->
            </a>

          </li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
      </div>
      <!-- Horizontal menu content-->
      <div class="navbar-container main-menu-content" data-menu="menu-container">
        <!-- include ../../../includes/mixins-->
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
          <?php //if ($loggedInAdmin->id == 1) { 
          ?>
          <li class="dropdown nav-item <?php echo $page_title == 'Dashboard'  ? 'active' : ''; ?>"><a class="nav-link" href="
            <?php
            if ($loggedInAdmin->level == 1) {
              echo url_for('/high-court/judge/judge.php');
            } elseif ($loggedInAdmin->level == 2) {
              echo url_for('/high-court/registrar/admin_judge.php');
            } elseif ($loggedInAdmin->level == 3) {
              echo url_for('/high-court/judge/admin_judge.php');
            } elseif ($loggedInAdmin->level == 4) {
              echo url_for('/high-court/registrar/registrar.php');
            } elseif ($loggedInAdmin->level == 5) {
              echo url_for('/high-court/bursar/');
            } elseif ($loggedInAdmin->level == 6) {
              echo url_for('/high-court/bursar/');
            } elseif ($loggedInAdmin->level == 7) {
              echo url_for('/high-court/bailif/bailif.php');
            } elseif ($loggedInAdmin->level == 8) {
              echo url_for('/high-court/clerk/clerk.php');
            } elseif ($loggedInAdmin->level == 10) {
              echo url_for('/high-court/mgt/');
            }elseif ($loggedInAdmin->level == 11) { // Dpp
              echo url_for('/dpp/');
            }elseif ($loggedInAdmin->level == 12) { // Police
              echo url_for('/police/');
            }elseif ($loggedInAdmin->level == 13) { // Prison
              echo url_for('/prison/');
            }
            ?>
            "><i class="feather-home"></i><span data-i18n="Dashboard">Dashboard</span></a>
          </li>
         
          <?php if ($loggedInAdmin->level == 1 || $loggedInAdmin->level == 2) { ?>
            <li class="dropdown nav-item <?php echo $page_title == 'All Judges' ? 'active' : ''; ?>" data-menu="dropdown">
              <a class="nav-link" href="<?php echo url_for('/admin/judges_admin/index.php') ?>"><i class="feather-package"></i><span data-i18n="Judge">Judges</span></a>
            </li>
            <li class="dropdown nav-item <?php echo $page_title == 'Court' || $page_title == 'New Court' || $page_title == 'Edit Court' ? 'active' : ''; ?>" data-menu="dropdown"><a class="nav-link" href="<?php echo url_for('/admin/court/') ?>"><i class="feather-package"></i><span data-i18n="Court">Courts</span></a>
            </li>

            <li class="dropdown nav-item <?php echo $page_title == 'Judgement' ? 'active' : ''; ?>" data-menu="dropdown">
              <a class="nav-link" href="<?php echo url_for('/high-court/judge/newjudgement.php') ?>"><i class="fa fa-gavel "></i><span data-i18n="Judge">Prepare Judgement</span></a>
            </li>

          <?php } ?>
          <!-- DPP -->
          <?php if ($loggedInAdmin->level == 11) { ?>
              <li class="dropdown nav-item <?php echo $page_title == 'File Case' ? 'active' : ''; ?>" data-menu="dropdown">
                <a class="nav-link" href="<?php echo url_for('/dpp/file_case.php') ?>"><i class="feather-package"></i><span data-i18n="Judge">File Case</span></a>
              </li>
          <?php } ?>

          <!-- Police -->
          <?php if ($loggedInAdmin->level == 12) { ?>
              <li class="dropdown nav-item <?php echo $page_title == 'Open File' ? 'active' : ''; ?>" data-menu="dropdown">
                <a class="nav-link" href="<?php echo url_for('/police/file.php') ?>"><i class="feather-package"></i><span data-i18n="Judge">Open File</span></a>
              </li>
          <?php } ?>


        </ul>
      </div>
    </div>
  </div>
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

  <div id="loader" style="display: none;" >
<!-- <div id="loader"  > -->
    <div class=" d-flex justify-content-center align-items-center" style="position: fixed;  height: 100%; width: 100%; z-index: 10000; background-color: rgb(0,0,0,0.7);">
      <div class="alert " style="background-color: #FFF; color: #000">
          <!-- <img width="40" src="<?php echo url_for('images/qoute_of_arm.png') ?>"> -->
           <?php 
            if($loggedInAdmin->level <= 10){ ?>
               <img src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="40" />
           <?php }else{ ?>
             <?php if ($loggedInAdmin->level == 11){ // DDP?>
                <img src="<?php echo url_for('/images/dpp.png') ?>" width="40" />
              <?php }elseif($loggedInAdmin->level == 12){ // Police ?>
                <img src="<?php echo url_for('/images/police.png') ?>" width="40" />
              <?php }else{ ?>
                <span>Nigeria Prison Service</span>
              <?php } ?>
           <?php } ?>
          <div class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span> 
          </div>
          <span id="processMsg"></span>
      </div>
    </div>
  </div>


    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-left mb-0"><?php echo $page_title; ?></h2>
              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>

                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block">
          <?php
              $time = date('H');
              if ($time < '12') {
                echo 'Good Morning! ';
              } elseif ($time >= '12' && $time < '17') {
                echo 'Good Afternoon! ';
              } elseif ($time >= '17' && $time < '19') {
                echo 'Good Evening! ';
              } elseif ($time >= '19') {
                echo 'Good Night! ';
              }
          ?>
          <div class="form-group breadcrum-right d-none">
            <div class="dropdown d-none">
              <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather-settings"></i></button>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Dashboard Analytics Start -->

        <!-- BEGIN: Content-->