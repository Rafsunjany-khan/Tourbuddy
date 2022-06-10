<section class="w3l-top-header-content">
	<div class="hny-top-menu" style="height: 45px;">
		<div class="top-hd">
			<div class="container-fluid">
				<div class="row">
					<ul class="social-top col-md-7">
            <?php 
           $travlers_name= Session::get('name');
           $traveler_id= Session::get('traveler_id');
           if($traveler_id>0){?>
            <li class="log-link mr-3"><a class="sign-in"  href="{{url('/traveler/desboard')}}"><span class="fa fa-user"></span> <?php echo $travlers_name; ?></a></li>
            <?php }else{ ?>
            <li class="log-link mr-3"><a class="sign-in"  href="{{url('/travelers/login')}}"><span class="fa fa-user"></span> Sign In</a></li>
          <?php  }?>
            
          
           
      
						
							
					</ul>
					<ul class="accounts col-md-5">
						<li class="top_li"><span class="fa fa-mobile"></span><a href="tel:+142 5897555">{{$contact->phone}}
								</a>
						</li>

						<li class="top_li mr-lg-0"><span class="fa fa-envelope-o"></span><a href="mailto:info@example.com">Need help?</a> <a href="{{url('/contact')}}"> Contact Us</a> 

						</li>
						
					</ul>
				</div>
			</div>
		</div>

	</div>

</section>