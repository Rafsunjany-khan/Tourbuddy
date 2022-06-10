
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="nth tech ltd">
    <link rel="icon" href="{{asset('public/adminassets/images/dashboard/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('public/admin/sassets/images/dashboard/favicon.png')}}" type="image/x-icon">
    <title>Admin - TourBuddy</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/fontawesome.css')}}">
     <link rel="stylesheet" href="{{asset('public/admin/assets/font-awesome/css/font-awesome.min.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/flag-icon.css')}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/icofont.css')}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/prism.css')}}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/chartist.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/admin.css')}}">
     <!-- Dropzone css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/dataTables.bootstrap4.min.css')}}">
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
              <!--   <div class="logo-wrapper"><a href="{{url('/admin')}}"><img class="blur-up lazyloaded" src="" alt=""></a></div> -->
            </div>
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
<!--                     <li>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <input class="form-control-plaintext" type="search" placeholder="Search.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                            </div>
                        </form>
                    </li> -->
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                    <!-- <li class="onhover-dropdown"><a class="txt-dark" href="#">
                        <h6>EN</h6></a>
                        <ul class="language-dropdown onhover-show-div p-20">
                            <li><a href="#" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a></li>
                            <li><a href="#" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a></li>
                            <li><a href="#" data-lng="pt"><i class="flag-icon flag-icon-uy"></i> Portuguese</a></li>
                            <li><a href="#" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a></li>
                        </ul>
                    </li> -->
                 <!--    <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">3</span><span class="dot"></span>
                        <ul class="notification-dropdown onhover-show-div p-0">
                            <li>Notification <span class="badge badge-pill badge-primary pull-right">3</span></li>
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Your order ready for Ship..!</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0 txt-success"><span><i class="download-color font-success" data-feather="download"></i></span>Download Complete</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger" data-feather="alert-circle"></i></span>250 MB trash files</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="txt-dark"><a href="#">All</a> notification</li>
                        </ul>
                    </li> -->
                  <!--   <li><a href="#"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li> -->
                    <li class="onhover-dropdown">
                        <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="{{asset('public/admin/assets/images/dashboard/man.png')}}" alt="header-user">
                            <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                        </div>
                        
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
    </div>
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">
    	<!-- Page Sidebar Start-->
        <div class="page-sidebar">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"><a href="{{url('/admin')}}"><img class="blur-up lazyloaded" src="" alt=""></a></div>
            </div>
            <div class="sidebar custom-scrollbar">
                
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{{url('/admin')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
                
                  
                  <li id="setting"><a class="sidebar-header" href="" ><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                           
                            <li>   <a href="{{route('admin.setting.bannerText')}}" id="update_bannertext"><i class="fa fa-circle"></i>Banner text</a> </li>
                            <li>   <a href="{{route('admin.setting.banner')}}" id="banner"><i class="fa fa-circle"></i>Banner</a> </li>
                            
                            <li>   <a href="{{url('/admin/about-us')}}" id="about_us"><i class="fa fa-circle"></i>About-us</a> </li>

                            <li>   <a href="{{url('/admin/contact')}}" id="contact_us"><i class="fa fa-circle"></i>Conatc-us</a> </li>
                            

                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="{{url('/admin/travelers')}}"><i data-feather="user"></i><span>Travelers </span></a></li>
                
                    
                   
					<li><a class="sidebar-header" href="{{route('admin.setting.slider')}}"><i data-feather="archive"></i><span>Slider</span></a>
                    </li>
                    <li><a class="sidebar-header" href="{{url('/admin/pending/post')}}"><i data-feather="log-in"></i><span>Pending Post</span></a>
                    </li>
                     <li><a class="sidebar-header" href="{{url('/admin/pending/guide')}}"><i data-feather="log-in"></i><span>Pending Guide</span></a>
                    </li>
                     <li><a class="sidebar-header" href="{{url('/admin/all/post')}}"><i data-feather="log-in"></i><span>Active Post</span></a>
                    </li>
                        <li><a class="sidebar-header" href="{{route('admin.guide.all')}}"><i data-feather="archive"></i><span>All Guide</span></a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->

        <script src="{{asset('public/admin/assets/js/jquery-3.3.1.min.js')}}"></script>

        <!-- Right sidebar Ends-->
        @yield('mainContent')
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2020 © Tour Buddy.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->


<!-- Bootstrap js-->
<script src="{{asset('public/admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/bootstrap.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('public/admin/assets/js/feather.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/feather-icon.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{asset('public/admin/assets/js/sidebar-menu.js')}}"></script>

<!--chartist js-->
<script src="{{asset('public/admin/assets/js/chartist.js')}}"></script>

<!--chartjs js-->
<script src="{{asset('public/admin/assets/js/chart.min.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('public/admin/assets/js/lazysizes.min.js')}}"></script>

<!--copycode js-->
<script src="{{asset('public/admin/assets/js/prism.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/clipboard.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/custom-card.js')}}"></script>

<!--counter js-->
<script src="{{asset('public/admin/assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/counter-custom.js')}}"></script>

<!--peity chart js-->
<script src="{{asset('public/admin/assets/js/peity.jquery.js')}}"></script>

<!--sparkline chart js-->
<script src="{{asset('public/admin/assets/js/sparkline.js')}}"></script>

<!--Customizer admin-->
<!--<script src="{{asset('public/admin/assets/js/admin-customizer.js')}}"></script>--> 

<!--dashboard custom js-->
<!-- <script src="{{asset('public/admin/assets/js/default.js')}}"></script> -->

<!--right sidebar js-->
<script src="{{asset('public/admin/assets/js/chat-menu.js')}}"></script>

<!--height equal js-->
<script src="{{asset('public/admin/assets/js/height-equal.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('public/admin/assets/js/lazysizes.min.js')}}"></script>





<!--script admin-->
<script src="{{asset('public/admin/assets/js/admin-script.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
    $('#example2').DataTable();
} );
</script>

</body>
</html>
