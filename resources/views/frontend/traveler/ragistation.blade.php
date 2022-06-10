
@extends('frontend.frontend_master')
@section('content')
<style type="">
	* {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=number],input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
				<div class="w3_content_agilleinfo_inner">
					<div class="agile_featured_movies">
					<form action="{{url('/traveler/save')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Your name"value="{{old('name')}}" name="name" id="name" required>
                @if($errors->has('name'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('name')}}</b> 
                                    </div>
                                    @endif
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" value="{{old('email')}}" name="email" id="email" required>
              @if($errors->has('email'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('name')}}</b> 
                                    </div>
                                    @endif
                <label for="phone"><b>Mobile</b></label>
                <input type="number" placeholder="01......" value="{{old('phone')}}" name="phone" id="phone" required> <br>
                @if($errors->has('phone'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('phone')}}</b> 
                                    </div>
                                    @endif
                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Dhaka,Bangladesh" value="{{old('addresss')}}" name="address" id="address" required> <br>
                 @if($errors->has('address'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('address')}}</b> 
                                    </div>
                                    @endif
                 <label> <b>Please select your gender:</b></label> <br>
                 <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="gender" checked="" value="female">
                <label for="female">Female</label><br>               
                <label for="image"><b>Photo</b></label>
                <input type="file" placeholder="Enter Your name" name="image" id="image" required> <br>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="psw" required>
                 @if($errors->has('password'))                                    
                                    <div class="text-center alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <b><i class="icon fa fa-warning"></i>{{$errors->first('password')}}</b> 
                                    </div>
                                    @endif
                                    <label for="psw"><b>Confirm Password</b></label>
                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                <hr>
                <button type="submit" class="registerbtn">Register</button>
              </div>

              <div class="container signin">
                <p>Already have an account? <a href="{{url('/travelers/login')}}">Sign in</a>.</p>
              </div>
            </form>
					</div>
				</div>


@endsection
