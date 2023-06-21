@extends('frontend.home_dashboard')
@section('content')
<div class="container">


    <div class="row">
        <div class="col-md-4">
    
            <div class="row">
    <div class="col-lg-12 col-md-12">
    <div class="contact-wrpp">
     
    
     <figure class="authorPage-image">
    <img alt="" src="{{(!empty( $userData->photo))? asset( $userData->photo): url('frontend/assets/images/lazy.jpg')}}" class="avatar avatar-96 photo" height="96" width="96" loading="lazy"> </figure>
    <h1 class="authorPage-name">
    <a href=" ">{{ $userData->name}} </a>
    </h1>
    <h6 class="authorPage-name">
     {{ $userData->email}}
    </h6>
      
     
    
    <ul>
     <li><a href=""><b>🟢 Your Profile </b></a> </li>
     <li> <a href=""> <b>🔵 Change Password </b> </a> </li> 
    <li> <a href=""> <b>🟠 Read Later List </b> </a> </li> 
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
    User Account </h4>
    <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
    <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
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
            User Name *
            </div>
            <div class="contact-form">
            <span class="wpcf7-form-control-wrap sub_title"><input type="text" id="username" name="username" value="{{old('username',$userData->username)}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span>
            </div>
            </div>

    <div class="col-md-12 col-sm-12">
    <div class="contact-title ">
    Name *
    </div>
    <div class="contact-form">
    <span class="wpcf7-form-control-wrap sub_title"><input type="text" id="name" name="name" value="{{old('name',$userData->name)}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span>
    </div>
    </div>

    <div class="col-md-12 col-sm-12">
    <div class="contact-title ">
    Email *
    </div>
    <div class="contact-form">
    <span class="wpcf7-form-control-wrap sub_title"><input type="email" name="email" value="{{old('email',$userData->email)}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" ></span>
    </div>
    </div>
    
    <div class="col-md-12 col-sm-12">
    <div class="contact-title ">
    Phone *
    </div>
    <div class="contact-form">
    <span class="wpcf7-form-control-wrap sub_title"><input type="text" name="phone" value="{{old('phone',$userData->phone)}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span>
    </div>
    </div>
    
    
    <div class="col-md-12 col-sm-12">
    <div class="contact-title ">
    Photo *
    </div>
    <div class="contact-form">
    <span class="wpcf7-form-control-wrap sub_title"><input type="file" id="image" name="photo" value="{{old('photo')}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"  ></span>
    </div>
    </div>

    <div class="col-md-12 col-sm-12">
    <div class="contact-title ">
    </div>
    <div class="contact-form">
    <span class="wpcf7-form-control-wrap sub_title">
        <img id="showImage" src="{{ (!empty($userData->photo)) ? url($userData->photo): url('frontend/assets/images/lazy.jpg') }} " class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" style="width:150px; height:150px; border-radius: 50%!important;">
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