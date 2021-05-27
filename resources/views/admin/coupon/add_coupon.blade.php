@extends('admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">Add Voucher</h4>
                    </div>
                    <form action="{{ asset('admin/voucher/process_add_voucher') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">Name</label>
                                    <input type="text" name="namecoupon" class="form-control" placeholder="Coupon Name" id="name" onblur="return upberFirstKey()" value="{{ old('name') }}">

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">Code</label>
                                    <input type="text" name="codecoupon" class="form-control" placeholder="Coupon Code">

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">Feature</label>
                                    <select name="feature" id="" class="form-control">
                                        <option value="0">Discount Percent</option>
                                        <option value="1">Discount Money</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">Amount</label>
                                    <input type="text" class="form-control" name="amount_coupon" placeholder="Amount Coupon">
                                </div>
                            </div>
                        </div>
                        <div class="list-divider"></div>
                        <input type="submit" class="btn btn-block btn-primary" value="Add">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center text-muted">
    All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
</footer>
@endsection

