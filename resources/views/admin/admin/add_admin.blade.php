@extends('admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title">Add Admin</h4>
                    </div>
                    <form action="{{ asset('admin/admin/process_add_admin') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" id="name" onblur="return upberFirstKey()" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger alert alert-danger form-inline">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">UserName</label>
                                    <input type="text" name="username" class="form-control" placeholder="UserName" onblur="return upberFirstKey()" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="" class="form-text">PassWord</label>
                                    <input type="password" name="password" class="form-control" placeholder="PassWord" onblur="return upberFirstKey()" value="{{ old('username') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="form-text">Image</label>
                                    <input type="file" name="image" id="file_upload" class="form-control" placeholder="Image" onchange="return uploadhinh()">
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="" id="hinhanh" alt="" height="100px" width="100px">
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

