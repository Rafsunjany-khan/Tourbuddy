<section class="w3l-footer-16">
    <div class="w3l-footer-16-main py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 column">
                    <div class="row">
                        <div class="col-md-8 column">

                                <a class="logo-2" href="index.html">
                                        <label class="lohny-2"><span class="fa fa-graduation-cap" aria-hidden="true"></span>Tour</label>Buddy</a>
                           
                            <div class="ad-text-inf">
                                <p><span class="color-hny">Address :</span> {{$contact->address}}</p>
                             </div>
                             <div class="ad-text-inf">
                                    <p><span class="color-hny">Email :</span> <a href="mailto:info@example.com">{{$contact->email}}</a></p>
                                 </div>
                                 <div class="ad-text-inf">
                                        <p><span class="color-hny">Phone :</span> <a href="tel:+142 5897555">{{$contact->phone}}</a></p>
                                     </div>
                        </div>
                        <div class="col-md-4 column">
                            <h3>Pages</h3>
                            <ul class="footer-gd-16">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('/about')}}">About Us</a></li>
							                 	<li><a href="{{url('/post')}}">Post</a></li>
								                <li><a href="{{url('blog')}}">Blog</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 column column3 mt-lg-0 mt-4">
                    <h3>Post</h3>
                    <ul class="list-unstyled d-flex flex-wrap">
                     <!--    <li class="">
                            <div class="row">
                                <a class="col-md-5 col-4" href="#">
                                    <img class="rounded img-fluid img-responsive" src="{{asset('public/frontend/assets/images/bg1.jpg')}}"
                                        alt="image">
                                </a>
                                <div class="col pl-0">
                                    <a class="footer-small-text" href="#">Lorem ipsum dolor sit amet adipiscin elit</a>
                                    <div class="text-sub-small">Feb 20th</div>
                                </div>
                            </div>
                        </li> -->
                        @foreach($lastest_post as $data)
                        <li class="mt-md-0 mt-2">
                            <div class="row my-2 my-md-3">
                                <a class="col-md-5 col-4" href="{{url('/post/'.$data->id)}}">
                                    <img class="rounded img-fluid img-responsive" src="{{asset('public/travelers/'.$data->image)}}"
                                        alt="image">
                                </a>
                                <div class="col pl-0">
                                    <a class="footer-small-text" href="{{url('/post/'.$data->id)}}">{{$data->title}}</a>
                                    <div class="text-sub-small">{{$data->created_at}}</div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
               <div class="col-lg-4 col-md-6 column column4 mt-lg-0 mt-4">
                    <h3>Blog </h3>
                    <ul class="list-unstyled d-flex flex-wrap">
                        @foreach($lastest_blog as $bog_data)
                        <li class="">
                            <div class="row">
                                <a class="col-md-5 col-4" href="{{url('/blog/'.$bog_data->id)}}">
                                    <img class="rounded img-fluid img-responsive" src="{{asset('public/travelers/'.$bog_data->blog_image)}}"
                                        alt="image">
                                </a>
                                <div class="col pl-0">
                                    <a class="footer-small-text" href="{{url('/blog/'.$bog_data->id)}}">{{$bog_data->title}}</a>
                                    <div class="text-sub-small">{{$bog_data->created_at}}</div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    <!--     <li class="mt-md-0 mt-2">
                            <div class="row my-2 my-md-3">
                                <a class="col-md-5 col-4" href="#">
                                    <img class="rounded img-fluid img-responsive" src="{{asset('public/frontend/assets/images/bg3.jpg')}}"
                                        alt="image">
                                </a>
                                <div class="col pl-0">
                                    <a class="footer-small-text" href="#">Cras at nunc sagittis, suscipit dolor</a>
                                    <div class="text-sub-small">Feb 22nd</div>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
            
        </div>
    </div>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
</section>