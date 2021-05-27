@extends('admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">Add Product</h4>
                    </div>
                    <form action="{{ asset('admin/product/process_add_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">Title</label>
                                    <input type="text" value="{{ old('title') }}" name="title" class="form-control upper" placeholder="Product title" id="title" onblur="return upberFirstKey()">
                                    @if ($errors->has('name'))
                                        <span class="text-danger alert alert-danger form-inline">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">Price</label>
                                    <input type="text" value="" name="price" class="form-control upper" placeholder="product price" onblur="return upberFirstKey()">
                                    @if ($errors->has('name'))
                                        <span class="text-danger alert alert-danger form-inline">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" >Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-text">Description</label>
                                    <textarea name="des" id="" cols="20" rows="2" class="form-control upper"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-text">Category</label>
                                    <select name="cateid" id="" class="form-control upper">
                                        @foreach ($cate as $ct)
                                            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-text">Image</label>
                                    <input type="file" value="" name="image" id="file_upload" class="form-control upper" onchange="return uploadhinh()">
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="" alt="" id="hinhanh" height="100px" width="100px">
                            </div>
                        </div>
                        <div class="list-divider"></div><br>
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

