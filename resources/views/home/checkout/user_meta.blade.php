@extends('layout1')
@section('content')
    <div class="container">


        <div class="row">
            <!--Form Sign In-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="signin-container">
                    <form action="{{ URL::to('process_add_user_meta') }}" name="frm-login" method="post">
                        @csrf
                        <p class="form-row col-sm-6">
                            <label for="fid-name">First Name<span class="requite">*</span></label>
                            <input type="text" name="firstname" value="" class="txt-input" required>
                        </p>
                        <p class="form-row col-sm-6">
                            <label for="fid-pass">Last Name:<span class="requite">*</span></label>
                            <input type="text" name="lastname" value="" class="txt-input" required>
                        </p>
                        <p class="form-row col-sm-6">
                            <label for="fid-pass">Company<span class="requite">*</span></label>
                            <input type="text" name="company" value="" class="txt-input" required>
                        </p>
                        <p class="form-row col-sm-6">
                            <label for="fid-pass">Address<span class="requite">*</span></label>
                            <input type="text" name="address" value="" class="txt-input" required>
                        </p>
                        <p class="form-row col-sm-6">
                            <label for="fid-pass">Mobile<span class="requite">*</span></label>
                            <input type="text" name="mobile" value="" class="txt-input" required>
                        </p>
                        <p class="form-row col-sm-6">
                            <label for="fid-pass">Country<span class="requite">*</span></label>
                            <input type="text" name="country" value="" class="txt-input" required>
                        </p>
                        <p class="form-row col-sm-6">
                            <label for="fid-pass">City<span class="requite">*</span></label>
                            <input type="text" name="city" value="" class="txt-input" required>
                        </p>
                        <p class="form-row col-sm-6">
                            <label for="fid-pass">State<span class="requite">*</span></label>
                            <input type="text" name="state" value="" class="txt-input" required>
                        </p>
                        <p class="form-row wrap-btn">
                            <button class="btn btn-submit btn-bold" type="submit">Add Shipping </button>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
