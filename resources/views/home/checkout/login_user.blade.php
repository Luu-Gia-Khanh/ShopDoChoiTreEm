@extends('layout1')
@section('content')
    <div class="container">
        <div class="row">
            <!--Form Sign In-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="signin-container">
                    <form action="{{ URL::to('process_login_user') }}" name="frm-login" method="post">
                        @csrf
                        <p class="form-row">
                            <label for="fid-name">Email Address:<span class="requite">*</span></label>
                            <input type="text" id="fid-name" name="email" value="" class="txt-input" required>
                        </p>
                        <p class="form-row">
                            <label for="fid-pass">Password:<span class="requite">*</span></label>
                            <input type="password" id="fid-pass" name="password" value="" class="txt-input" required>
                        </p>
                        <p class="form-row wrap-btn">
                            <button class="btn btn-submit btn-bold" type="submit">sign in</button>
                            <a href="#" class="link-to-help">Forgot your password</a>
                        </p>
                    </form>
                </div>
            </div>
            <!--Go to Register form-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title">New Customer?</h4>
                        <p class="sub-title">Create an account with us and you’ll be able to:</p>
                        <ul class="lis">
                            <li>Check out faster</li>
                            <li>Save multiple shipping anddesses</li>
                            <li>Access your order history</li>
                            <li>Track new orders</li>
                            <li>Save items to your Wishlist</li>
                        </ul>
                        <a href="#" class="btn btn-bold">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
