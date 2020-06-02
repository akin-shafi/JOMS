<?php include(SHARED_PATH . '/lawyer_header_link.php'); ?>
<?php
require_login();
?>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

  <!-- BEGIN: Header-->
  <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="navbar-collapse" id="navbar-mobile">
          <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav">
              <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather-menu"></i></a></li>
            </ul>

            <ul class="nav navbar-nav">
              <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather-check-square"></i></a>
                <div class="bookmark-input search-input">
                  <div class="bookmark-input-icon"><i class="feather-search primary"></i></div>
                  <input class="form-control input" type="text" placeholder="Search in JOMS ..." tabindex="0" data-search="template-list">
                  <ul class="search-list"></ul>
                </div>
                <!-- select.bookmark-select-->
                <!--   option Chat-->
                <!--   option email-->
                <!--   option todo-->
                <!--   option Calendar-->
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
            <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
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

                  </a>

                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo $loggedInClient->full_name(); ?></span><span class="user-status">Call No: <?php echo $loggedInClient->call_no; ?></span></div><span><img class="round" src="<?php echo url_for('images/profile.svg') ?>" alt="avatar" height="40" width="40"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="page-user-profile.html">
                  <i class="feather-user"></i> Edit Profile</a>

                  <!-- <a class="dropdown-item" href="app-email.html">
                    <i class="feather-mail"></i> My Inbox</a>
                    <a class="dropdown-item" href="app-todo.html"><i class="feather-check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="feather-message-square"></i> Chats</a> -->
                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo url_for('/lawyer/logout.php') ?>"><i class="feather-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- END: Header-->


  <!-- BEGIN: Main Menu-->
  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand mt-0" href="#">
            <div class="brand-logo"><img class="" src="<?php echo url_for('/images/qoute_of_arm.png') ?>" width="150" /></div>
            <h2 class="brand-text mb-0"></h2>

          </a></li>
        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
      </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="active nav-item"><a href="<?php echo url_for('/lawyer/index.php') ?>"><i class="feather-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
            <span class="badge badge badge-warning badge-pill float-right mr-2">1</span>
          </a>
          <ul class="menu-content">
            <li><a href="<?php echo url_for('/lawyer/index.php') ?>"><i class="feather-circle"></i><span class="menu-item" data-i18n="Analytics">All Activities</span></a>
            </li>

          </ul>
        </li>

        <li class=" navigation-header"><span>Litigation</span>
        </li>
        <li class=" nav-item"><a href="<?php echo url_for('lawyer/new.php') ?>">
            <i class="feather-file"></i><span class="menu-title" data-i18n="Sweet Alert">File New Case</span></a>
        </li>
        

      </ul>
    </div>
  </div>
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-left mb-0"><?php echo $page_name . '' . $page_title; ?></h2>
              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo url_for('/lawyer/') ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item">

                    <?php if ($page_title == 'File New Case') { ?>

                      File New case

                    <?php } ?>

                  </li>



                </ol>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="content-body">
        <!-- Form wizard with number tabs section start -->