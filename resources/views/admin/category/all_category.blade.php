@extends('admin_layout')
@section('content')
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h4 class="card-title">All Category</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap v-middle mb-0" style="text-align: center">
                                <thead>
                                    <tr class="border-0">
                                        <th class="border-0 font-14 font-weight-medium text-muted">ID
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Name
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Status
                                        </th>
                                        <th class="border-0 font-14 font-weight-medium text-muted">Thao Tác
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_cate as $ct)
                                        <tr>
                                            <td class="text-muted px-2 py-4 font-14">{{ $ct->id }}</td>
                                            <td class="text-muted px-2 py-4 font-14">{{ $ct->name }}</td>

                                                @if ($ct->status==1)
                                                    <td class="text-muted px-2 py-4 font-14">Hiện</td>
                                                @else
                                                    <td class="text-muted px-2 py-4 font-14">Ẩn</td>
                                                @endif

                                            <td>
                                                <a class="btn btn-success text-white"
                                                    href="{{ asset('admin/category/remove_cate/'.$ct->id) }}">Xóa</a>
                                                <a class="btn btn-warning text-white"
                                                    href="{{ asset('admin/category/update_cate/'.$ct->id) }}">Sửa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
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
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->

@endsection
