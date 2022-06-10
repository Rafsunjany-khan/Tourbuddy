
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TourBuddy | Home :: </title>

  <link rel="stylesheet" href="{{asset('public/frontend/assets/css/style.css')}}">
  <link href="//fonts.googleapis.com/css?family=Muli:300,300i,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,500,700,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css/dataTables.bootstrap4.min.css')}}">
  <script src="{{asset('public/frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

        
</head>
<body>

<!--/top-header-content-->      
@include('frontend.inc.tr_header')
<!--//top-header-content-->
@yield('content')

<!-- footer -->
@include('frontend.inc.footer')
<!-- //footer -->
</body>

</html>

<script src="{{asset('public/frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!--/filter-->
<script>
  $(document).ready(function () {

    $(".filter-button").click(function () {
      var value = $(this).attr('data-filter');

      if (value == "all") {
        //$('.filter').removeClass('hidden');
        $('.filter').show('1000');
      } else {
        //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
        //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter").not('.' + value).hide('3000');
        $('.filter').filter('.' + value).show('3000');

      }
    });

  });
</script>
<!--//filter-->
<!--pop-up-box-->

<script src="{{asset('public/frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

    $('.popup-with-move-anim').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom'
    });
  });
</script>

<!--//pop-up-box-->
<script src="{{asset('public/frontend/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
    $('#example2').DataTable();
} );
</script>