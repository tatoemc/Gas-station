@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css-rtl/bootstrap-datepicker.css') }}" rel="stylesheet">
@endsection

@section('title')
    المواقع
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المواقع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ كل
                    المواقع</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">


        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add_Location'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة الموقع بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif
    @if (session()->has('Update_Location'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تعديل الموقع  بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif
    @if (session()->has('delete_location'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف  الموقع بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-primary btn-sm" data-effect="effect-scale" data-toggle="modal"
                            href="#location_add">اضافة </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0"> اسم الموقع</th>
                                     <th class="border-bottom-0">المدينة</th>
                                    <th class="border-bottom-0">الوصف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $index => $location)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $location->name }} </td>
                                        <td>{{ $location->city }} </td>
                                        <td>{{ $location->desc }} </td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">

                                                    <a class="dropdown-item"
                                                        href="{{ route('locations.show', $location->id) }}">
                                                        <i class="text-success fas fa-eye"></i>&nbsp;&nbsp;عرض
                                                    </a>
                                                    <a class="dropdown-item"  href="{{ route('locations.edit', $location->id) }}">
                                                        <i class="text-success fas fa-pen-alt"></i>&nbsp;&nbsp;تعديل
                                                    </a>


                                                    <a class="dropdown-item" data-id="{{ $location->id }}"
                                                        data-toggle="modal" data-target="#location_delete">
                                                        <i class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->
    </div>
    <!-- row closed -->
    <!-- add -->
    <div class="modal fade" id="location_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">أضافة موقع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('locations.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">اسم الموقع</label>
                            <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="city">المدينة</label>
                            <select name="city" id="select-beast" class="form-control  nice-select  custom-select">
                                <option value="الخرطوم">الخرطوم</option>
                                <option value="بحري">بحري</option>
                                <option value="ام درمان">ام درمان</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="square">المربع</label>
                            <input type="text" class="form-control" id="square" name="square" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="desc">الوصف</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">اضافة</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <!-- delete -->
    <div class="modal" id="location_delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                 <form action="{{ route('locations.destroy', 'destroy') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datepicker.js') }}"></script>

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var desc = button.data('desc')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #desc').val(desc);
        })
    </script>

    <script>
    $('#location_delete').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        
    })

    </script>

@endsection
