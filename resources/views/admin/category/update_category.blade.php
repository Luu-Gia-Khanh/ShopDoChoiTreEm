@extends('admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">Update Category</h4>
                    </div>
                    <form action="{{ asset('admin/category/process_update_category/'.$cate->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-text">Name</label>
                                    <input type="text" value="{{ $cate->name }}" name="name" class="form-control" placeholder="Category Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-text">Status</label>
                                    <select name="status" id="" class="form-control">
                                        @if ($cate->status==1)
                                            <option value="1" selected>Hiện</option>
                                            <option value="0" >Ẩn</option>
                                        @else
                                            <option value="1">Hiện</option>
                                            <option value="0" selected>Ẩn</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="list-divider"></div>
                        <input type="submit" class="btn btn-block btn-primary" value="Update">
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
