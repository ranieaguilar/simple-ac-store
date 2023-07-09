<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themetechmount.com/html/fixfellow/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 02:30:45 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="keywords" content="">
    <meta name="description" content="Ecommerce &raquo; HTML Template" />
    <meta name="author" content="https://www.themetechmount.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title></title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="<?= base_url('public/fixfellow/') ?>images/favicon.png" />

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/bootstrap.min.css" />

    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/animate.css" />

    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/font-awesome.css" />

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/themify-icons.css" />

    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/slick.css">

    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/slick-theme.css">

    <!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>revolution/css/layers.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>revolution/css/settings.css">

    <!-- magnific-popup -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/magnific-popup.css" />

    <!-- megamenu -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/megamenu.css">

    <!-- shortcodes -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/shortcodes.css" />

    <!-- main -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/main.css" />

    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/fixfellow/') ?>css/responsive.css" />

</head>

<body>

    <!--page start-->
    <div class="page">
        <?php if(!session()->get('popup')):?>
        <div class="newsletter_popup_wrap newsletter">
            <div class="newsletter_content align-items-center h-auto p-3">
                <button type="button" class="close" data-dismiss="newsletter">&times;</button>
                <div class="d-flex align-items-center justify-content-start">

                    <form method="post" action="/Client/guest">
                        <h4>Continue as.</h4>
                        <div class="row mb-2">
                            <div class="col">
                                <input type="text" class="form-control" name="firstname" placeholder="First name">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="lastname" placeholder="Last name">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <input type="text" class="form-control mb-2" name="address" placeholder="Address">
                        <div class="form-group">
                            <button id="login-button" type="submit"
                                class="button action-button expand-center mb-15 btn-block">
                                <span class="label">Submit and continue as guest</span>
                                <span class="spinner"></span>
                            </button>

                        </div>
                        <div class=" text-center">
                            <h6 class="font-weight-normal">OR</h6>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button type="button" onclick="location.href='<?= base_url('client/login')?>'" id=""
                                        class="button action-button expand-center btn-block">
                                        <span class="label">Login</span>
                                        <span class="spinner"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button type="button" onclick="location.href='<?= base_url('client/register')?>'"
                                        id="" class="button action-button expand-center btn-block">
                                        <span class="label">Register</span>
                                        <span class="spinner"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif;?>

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            <!-- top_bar -->

            <!-- header_main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-3 order-1">
                            <!-- site-branding -->
                            <div class="site-branding">
                                <a class="home-link" href="" title="Fixfellow" rel="home">
                                    <img id="logo-img" class="img-center"
                                        src="<?= base_url('public/admin/') . session()->get('ss_image'); ?>" width="40"
                                        height="40" alt="logo-img">
                                </a>
                            </div><!-- site-branding end -->
                        </div>
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <!-- header_search -->
                                <div class="header_search_content">
                                    <div id="search_block_top" class="search_block_top">
                                        <form id="searchbox" method="post" action="/Client/searchItem">
                                            <input class="search_query form-control" type="text" id="search_query_top"
                                                name="search" placeholder="Search For Item...." value="">
                                            <div class="categories-block">
                                                <select id="search_category" name="search_category"
                                                    class="form-control">
                                                    <!-- <option value="all">All Categories</option> -->
                                                    <option value="product_name" selected>Name</option>
                                                    <option value="product_brand">Brand</option>
                                                    <option value="product_model">Model</option>
                                                    <option value="product_type">Type</option>
                                                    <option value="product_cooling_capacity">Cooling Capacity</option>
                                                    <option value="product_power_consumption">Power Consumption</option>
                                                    <option value="product_price">Price</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="submit_search"
                                                class="btn btn-default button-search"><i
                                                    class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- header_search end -->
                        </div>
                        <div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <!-- header_extra -->
                            <div class="header_extra d-flex flex-row align-items-center justify-content-end">
                                <div class="account dropdown">
                                    <div class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="account_icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="account_content">
                                            <div class="account_text"><a href="#">
                                                    <?php if(session()->get('client_loggedin')){
                                                    echo session()->get('client_firstname');
                                                }else{
                                                    echo 'Sign In';
                                                }
                                                ?>
                                                </a></div>
                                        </div>
                                    </div>
                                    <div class="account_extra dropdown_link" data-toggle="dropdown">Account</div>
                                    <aside class="widget_account dropdown_content">
                                        <div class="widget_account_content">
                                            <?php if(!session()->get('client_loggedin')):?>
                                            <ul>

                                                <li><i class="fa fa-sign-in mr-2"></i><a href="/Client/login">Login</a>
                                                </li>
                                                <li><i class="fa fa-sign-in mr-2"></i><a
                                                        href="/Client/register">Register</a></li>
                                            </ul>
                                            <?php else:?>
                                            <ul>
                                                <li><i class="fa fa-sign-in mr-2"></i><a
                                                        href="/Client/logout">Logout</a></li>
                                            </ul>
                                            <?php endif;?>
                                        </div>
                                    </aside>
                                </div>
                                <?php if (session()->get('client_loggedin')) : ?>
                                <div class="cart">
                                    <div class="d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <i class="fa fa-heart"></i>

                                            <?php if(!empty(session()->get('likess'))):?>
                                            <div class="cart_count"><?= session()->get('likess')?></div>
                                            <?php endif;?>
                                        </div>

                                        <div class="cart_content">
                                            <div class="cart_text"><a
                                                    href="/Client/view_likes/<?= session()->get('client_id')?>">My
                                                    Likes</a></div>
                                            <div class="cart_price"></div>
                                        </div>
                                    </div>

                                </div>
                                <?php endif; ?>
                            </div><!-- header_extra end -->
                        </div>
                    </div>
                </div>
            </div><!-- haeder-main end -->
            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu ttm-bgcolor-white clearfix">
                <div class="site-header-menu-inner stickable-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main_nav_content d-flex flex-row">
                                    <!-- <div class="cat_menu_container">
                                        <a href="#" class="cat_menu d-flex flex-row align-items-center">
                                            <div class="cat_icon"><i class="fa fa-bars"></i></div>
                                            <div class="cat_text"><span>Shop by</span>
                                                <h4>Categories</h4>
                                            </div>
                                        </a>
                                        <ul class="cat_menu_list menu-vertical">
                                            <li><a href="#" class="close-side"><i class="fa fa-times"></i></a></li>
                                            <li><a href="#">Cutter Wood</a></li>
                                            <li><a href="#">Power Tools</a></li>
                                            <li><a href="#">Saw Map</a></li>
                                            <li><a href="#">Electric Tools</a></li>
                                            <li><a href="#">Collapsible</a></li>
                                            <li><a href="#">Corded Planer</a></li>
                                        </ul>
                                    </div> -->
                                    <!--site-navigation -->
                                    <div id="site-navigation" class="site-navigation">
                                        <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                            <span class="menubar-box">
                                                <span class="menubar-inner"></span>
                                            </span>
                                        </div>
                                        <!-- menu -->
                                        <nav class="menu menu-mobile" id="menu">
                                            <ul class="nav">
                                                <li class="mega-menu-item">
                                                    <a href="<?= base_url() . 'Client/'?>" class="">Home</a>
                                                </li>
                                                <?php if(session()->get('client_loggedin')):?>
                                                <li class="mega-menu-item">
                                                    <a href="/Client/view_profile" class="">Profile</a>
                                                </li>
                                                <?php endif;?>
                                                <?php if(session()->get('client_loggedin')):?>
                                                <li class="mega-menu-item">
                                                    <a href="/Client/chat/<?= session()->get('client_id')?>"
                                                        class="">Chats</a>
                                                </li>
                                                <?php endif;?>
                                                <li><a href="/Client/contact_us">Contact Us</a></li>
                                            </ul>
                                        </nav>
                                    </div><!-- site-navigation end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- site-header-menu end -->
        </header>
        <!--header end-->

        <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="page-title-heading">
                                <h1 class="title"><?= $title ?></h1>
                            </div>
                            <!-- <div class="breadcrumb-wrapper">
                                <span class="mr-1"><i class="ti ti-home"></i></span>
                                <a title="Homepage" href="index.html">Home</a>
                                <span class="ttm-bread-sep">&nbsp;/&nbsp;</span>
                                <span class="ttm-textcolor-skincolor">Login</span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- page-title end-->

        <!--site-main start-->
        <div class="site-main">
            <?php if (!empty(session()->get('alert'))): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->get('alert') ?>
            </div>
            <?php endif; ?>
            <?= $this->renderSection('content') ?>


        </div>
        <!--site-main end-->


        <!--footer start-->
        <footer class="footer widget-footer ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
            <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
            <!-- <div class="first-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 widget-area">
                            <div class="widget ttm-footer-cta-wrapper">
                                <h5>Join Our Newsletter Now!</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-5 widget-area m-auto">
                            <div class="widget ttm-footer-cta-wrapper">
                                <form id="subscribe-form" class="newsletter-form" method="post" action="#"
                                    data-mailchimp="true">
                                    <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                        <p>
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="email" name="email" placeholder="Your Email Add.." required="">
                                        </p>
                                        <p><input type="submit" value="SUBMIT"></p>
                                    </div>
                                    <div id="subscribe-msg"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 widget-area">
                            <div class="social-icons social-hover widget text-center">
                                <ul class="list-inline">
                                    <li class="social-facebook"><a class="tooltip-top" href="#"
                                            data-tooltip="Facebook"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li class="social-twitter"><a class="tooltip-top" href="#" data-tooltip="Twitter"><i
                                                class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li class="social-gplus"><a class="tooltip-top" href="#" data-tooltip="Google+"><i
                                                class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li class="social-linkedin"><a class="tooltip-top" href="#"
                                            data-tooltip="LinkedIn"><i class="fa fa-linkedin"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="sep_holder_box">
                <span class="sep_holder"><span class="sep_line"></span></span>
            </div>
            <div class="second-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 widget-area m-auto">
                            <div class="widget">
                                <div class="footer-logo">
                                    <img id="footer-logo-img" class="img-center" src="images/footer-logo.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 widget-area">
                            <div class="widget widget_text ml-40">
                                <ul class="widget_info_text">
                                    <li><i class="fa fa-map-marker"></i><strong>Our Main Branch</strong> <br> NewYork
                                        City,United States</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_text">
                                <ul class="widget_info_text">
                                    <li><i class="fa fa-envelope-o"></i><strong>Email US</strong> <br> Info@example.com
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_text">
                                <ul class="widget_info_text">
                                    <li><i class="fa fa-phone"></i><strong>Call Us</strong> <br> +123-456-7890 / 91</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sep_holder_box">
                <span class="sep_holder"><span class="sep_line"></span></span>
            </div>
            <!-- <div class="third-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 widget-area mr-auto">
                            <div class="widget widget_text pr-25 clearfix">
                                <h3 class="widget-title">About Us</h3>
                                <div class="textwidget widget-text">
                                    <p class="pb-10">Lorem Ipsum is simp dummy text of the printing and Lorem Ipsum is
                                        simp dummy text of the printing and types etting industry. Lorem Ipsum hatypes.
                                    </p>
                                    <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor" href="#" title="">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                                <h3 class="widget-title">Our Company</h3>
                                <ul class="menu-footer-quick-links">
                                    <li><a href="#">Delivery</a>
                                    </li>
                                    <li><a href="#">Legal Notice</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Secure Payments</a></li>
                                    <li><a href="#">Stores</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                                <h3 class="widget-title">Products</h3>
                                <ul class="menu-footer-quick-links">
                                    <li><a href="#">Price Drops</a></li>
                                    <li><a href="#">New Products</a></li>
                                    <li><a href="#">Best Sales</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget contact_map clearfix">
                                <h3 class="widget-title">Our Stores</h3>
                                <div class="footer_map mb-30 mt-5">
                                    <img src="images/footer_map.png" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sep_holder_box">
                <span class="sep_holder"><span class="sep_line"></span></span>
            </div> -->
            <div class="bottom-footer-text">
                <div class="container">
                    <div class="row copyright">
                        <div class="col-md-12 col-lg-6 ttm-footer2-left">
                            <span>Copyright © <?= session()->get('ss_name')?></span>
                        </div>
                        <div class="col-md-12 col-lg-6 ttm-footer2-right">

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer end-->


        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->

    </div><!-- page end -->
    <!-- Javascript -->

    <script src="<?= base_url('public/fixfellow/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/tether.min.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/jquery.easing.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/jquery-waypoints.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/jquery-validate.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/numinate.min.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/slick.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/price_range_script.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/easyzoom.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>js/main.js"></script>

    <!-- Revolution Slider -->
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/slider.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.actions.min.js">
    </script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.carousel.min.js">
    </script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.kenburn.min.js">
    </script>
    <script
        src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.migration.min.js">
    </script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.navigation.min.js">
    </script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.parallax.min.js">
    </script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.slideanims.min.js">
    </script>
    <script src="<?= base_url('public/fixfellow/') ?>revolution/js/extensions/revolution.extension.video.min.js">
    </script>

    <!-- Javascript end-->
    <script>
    $(function() {
        var ChatDiv = $('.chat_container');
        var height = ChatDiv[0].scrollHeight;
        ChatDiv.scrollTop(height);
    });
    </script>


</body>

<!-- Mirrored from themetechmount.com/html/fixfellow/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 02:30:53 GMT -->

</html>