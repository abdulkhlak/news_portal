@extends('frontend.home_dashboard')
@section('content')
<div class="container">


    <div class="row">
        <div class="col-md-4">
    
            <div class="row">
    <div class="col-lg-12 col-md-12">
    <div class="contact-wrpp">
     
    
     <figure class="authorPage-image">
    <img alt="" src="{{(!empty( $user->photo))? asset( $user->photo): url('frontend/assets/images/lazy.jpg')}}" class="avatar avatar-96 photo" height="96" width="96" loading="lazy"> </figure>
    <h1 class="authorPage-name">
    <a href=" ">{{ $user->name}} </a>
    </h1>
    <h6 class="authorPage-name">
     {{ $user->email}}
    </h6>
      
     
    
    <ul>
        <li><a href="{{route('user.dashboard')}}"><b>🟢 Your Profile </b></a> </li>
     <li> <a href="{{route('user.change.password')}}"> <b>🔵 Change Password </b> </a> </li> 
    <li> <a href=""> <b>🟠 Read Later List </b> </a> </li> 
    <li> <a href="{{route('user.logout')}}"> <b>🟠 Log Out </b> </a> </li> 
    </ul>
    
    </div>
    </div>
    </div>
    
            
        </div>
    
        <div class="col-md-8">
    
    
            <div class="row">
    <div class="col-lg-12 col-md-12">
    <div class="contact-wrpp">
    <h4 class="contactAddess-title text-center">
    User Password Change </h4>
    <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
    <form method="POST" action="{{route('user.update.password.store')}}" enctype="multipart/form-data">
        @csrf
        @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @elseif(session('error'))
                              <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div> 
                                    @endif
    <div style="display: none;">
     
    </div>
    
    <div class="main_section">
    <div class="row">
     
        <div class="col-md-12 col-sm-12">
            <div class="contact-title ">
           Old Password
            </div>
            <div class="contact-form">
            <span class="wpcf7-form-control-wrap sub_title">
                <input type="password" id="old_password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" >
                @error('old_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </span>
            </div>
            </div>

    <div class="col-md-12 col-sm-12">
    <div class="contact-title ">
   New Password
    </div>
    <div class="contact-form">
    <span class="wpcf7-form-control-wrap sub_title">
        <input type="password" class="form-control  @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
        @error('new_password')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </span>
    </div>
    </div>

    <div class="col-md-12 col-sm-12">
    <div class="contact-title ">
    Confirm Password
    </div>
    <div class="contact-form">
    <span class="wpcf7-form-control-wrap sub_title">
        <input type="password" class="form-control @error('new_password_confirmed') is-invalid @enderror" id="new_password_confirmed" name="new_password_confirmed">

        @error('new_password_confirmed')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </span>
    </div>
    </div>
    </div>
     
     
     
     
    <div class="row">
    <div class="col-md-12">
    <div class="contact-btn">
    <input type="submit" value="Save Changes" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span>
    </div>
    </div>
    </div>
    </div>
</form>
</div>
    </div>
    </div>
    </div>        
        </div>
        
    </div> <!--  // end row -->
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection