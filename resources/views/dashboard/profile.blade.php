@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Profile
@endsection

@section('content')
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">My Profile</h3>
            </div>
            <div class="tr-single-body">
                <div class="row">
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <p>
                            <label>First Name</label>
                            <input type="text" id="firstname" class="form-control" value="Shaurya" name="firstname">
                        </p>

                        <p>
                            <label>Last Name</label>
                            <input type="text" id="secondname" class="form-control" value="Preet" name="firstname">
                        </p>

                        <p>
                            <label>Email</label>
                            <input type="text" id="useremail" class="form-control" value="danielraj@gmail.com" name="useremail">
                        </p>
                        
                        <p>
                            <label>About Me</label>
                            <textarea id="about_me" class="form-control" name="about_me"></textarea>
                        </p>
                           
                        <p>
                        <label>I live in</label>
                           <input type="text" id="live_in" class="form-control" value="" name="live_in">
                        </p>
                           
                        <p>
                            <label>I speak</label>
                            <input type="text" id="i_speak" class="form-control" value="" name="i_speak">
                        </p>
                         <p>
                            <label>Payment Info/Hidden Field</label>
                            <textarea id="payment_info" class="form-control" name="payment_info" cols="70" rows="3"></textarea>
                        </p>
                    </div>
                    <!-- /col-md-4 -->
                    
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <p>
                            <label>Phone</label>
                            <input type="text" id="userphone" class="form-control" value="" name="userphone">
                        </p>
                        <p>
                            <label>city</label>
                            <input type="text" id="usermobile" class="form-control" value="" name="usermobile">
                        </p>

                        <p>
                            <label>Skype</label>
                            <input type="text" id="userskype" class="form-control" value="" name="userskype">
                        </p>
                        
                        <p>
                            <label>Facebook Url</label>
                            <input type="text" id="userfacebook" class="form-control" value="" name="userfacebook">
                        </p>

                         <p>
                            <label>Twitter Url</label>
                            <input type="text" id="usertwitter" class="form-control" value="" name="usertwitter">
                        </p>

                         <p>
                            <label>Linkedin Url</label>
                            <input type="text" id="userlinkedin" class="form-control" value="" name="userlinkedin">
                        </p>

                         <p>
                            <label>Pinterest Url</label>
                            <input type="text" id="userpinterest" class="form-control" height="100" value="" name="userpinterest">
                        </p>
                    </div>
                    <!-- /col-md-4 -->
                    
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div id="profile-div" class="feature-media-upload">
                            
                            <img id="profile-image" class="img-responsive" src="assets/img/user-3.jpg" alt="user image">
                            <div id="upload-container">                 
                                <div id="aaiu-upload-container" style="position: relative;">                 

                                    <button type="file" id="aaiu-uploader" class="btn theme-btn full-width">Upload Image</button>
                                </div>
                                <span class="upload_explain">* recommended size: minimum 550px </span>
                           
                            </div>
                        </div>
                    </div>
                    <!-- /col-md-4 -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection