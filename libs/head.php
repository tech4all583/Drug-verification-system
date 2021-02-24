<!Doctype html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />
    <title><?= page_title(@$page_title) ?></title>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/bootstrap/css/bootstrap.min.css" /><link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/font-awesome/css/fontawesome-all.min.css" /><link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/animate/animate.min.css" /><link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/simple-line-icons/css/simple-line-icons.min.css" /><link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/owlcarousel/assets/811690873.css" /><link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/owlcarousel/assets/588664834.css" /><link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/magnific-popup/magnific-popup.min.css" />


    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= HTML_TEMPLATE ?>css/theme.css" />
    <link rel="stylesheet" href="<?= HTML_TEMPLATE ?>css/theme-elements.css" />
    <link rel="stylesheet" href="<?= HTML_TEMPLATE ?>css/theme-blog.css" />
    <link rel="stylesheet" href="<?= HTML_TEMPLATE ?>css/theme-shop.css" />
    <!-- Current Page CSS -->
    <link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/rs-plugin/css/settings.css" /><link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/rs-plugin/css/layers.css" /><link rel="stylesheet" href="<?= HTML_TEMPLATE ?>vendor/rs-plugin/css/navigation.css" />

    <!-- Demo CSS -->
    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= HTML_TEMPLATE ?>css/skins/skin-corporate-hosting.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= HTML_TEMPLATE ?>css/custom.css" />
    <!-- Head Libs -->
    <script src="<?= HTML_TEMPLATE ?>vendor/modernizr/modernizr.min.js"></script>
</head>
<body class="body">

<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-55px', 'stickyChangeLogo': false}">
    <div class="header-body">

        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="<?= base_url() ?>">
                                <img alt="Porto" width="300" height="80" src="<?= image_url('originallogo.jpg') ?>">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav">
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a class="" href="<?= base_url() ?>">Home
                                            </a>

                                        </li>


                                        <li class="dropdown">
                                            <a class="" href="#plans">Register
                                            </a>

                                        </li>
                                        <li class="dropdown dropdown-mega-signin signin" id="headerAccount">
                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                <i class="fas fa-user"></i> &nbsp; Sign In
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="login_aspx.html">As Staff</a></li>
                                                <li><a class="dropdown-item" href="App_Application/CheckOut_aspx.html">As Client</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown">
                                            <a class="" href="#">About Developers
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                            <a onclick="return false;" id="btnHeader" class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;btnHeader&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
