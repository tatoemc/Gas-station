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
 الدفعيات
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الدفعيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ كل
                     الدفعيات</span>
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
     @if (session()->has('add_payment'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تأكيد الدفعية بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">اسم الكافل</th>
                                    <th class="border-bottom-0"> اسم اليتيم</th>
                                     <th class="border-bottom-0">تاريخ الدفع</th>
                                    <th class="border-bottom-0">الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $index => $payment)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                       
                                        <td>{{ $payment->guardian->user->name }} </td>
                                        <td>{{ $payment->orphan->name }}</td>
                                         <td>{{ date( 'M j Y', strtotime($payment->created_at)) }}</td>
                                        <td>
                                            @if ($payment->stauts == 0)
                                                <span class="text-danger">لم يتم التأكيد</span>
                                            @elseif($payment->stauts == 1)
                                                <span class="text-success">تم التأكيد</span>
                                            @endif

                                       
                                        </td>
                                        <td>
                                                <div class="dropdown">
                                                    <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                        type="button">العمليات<i
                                                            class="fas fa-caret-down ml-1"></i></button>
                                                    <div class="dropdown-menu tx-13">

                                                        <a class="dropdown-item"
                                                            href=" {{ route('payments.edit', $payment->id) }}"><i
                                                                class="text-success fas fa-edit"></i>&nbsp;&nbsp;تعديل
                                                        </a>

                                                        <a class="dropdown-item"
                                                            href=" {{ route('payments.show', $payment->id) }}"><i
                                                                class="text-success fas fa-eye"></i>&nbsp;&nbsp;عرض
                                                        </a>

                                                        <a class="dropdown-item" data-payment_id="{{ $payment->id }}"
                                                            data-toggle="modal" data-target="#delete_payment"
                                                            href="Print_payment/{{ $payment->id }}"><i
                                                                class="text-success fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                            
                                                        </a>
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
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف اليتيم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="orphans/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
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
        $('#edit_orphan').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var gender = button.data('gender')
            var b_date = button.data('b_date')

            var add = button.data('add')
            var ssn = button.data('ssn')
            var helth_state = button.data('helth_state')
            var father_deth = button.data('father_deth')
            var brother_count = button.data('brother_count')
            var death_certif = button.data('death_certif')
            var images = button.data('images')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #gender').val(gender);
            modal.find('.modal-body #b_date').val(b_date);

            modal.find('.modal-body #add').val(add);
            modal.find('.modal-body #ssn').val(ssn);
            modal.find('.modal-body #helth_state').val(helth_state);
            modal.find('.modal-body #father_deth').val(father_deth);
            modal.find('.modal-body #brother_count').val(brother_count);
            modal.find('.modal-body #death_certif').val(death_certif);
            modal.find('.modal-body #images').val(images);

        })


        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>

    <script>
        $(function() {
            $('.dates #b_date').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'multidate': true
            });

        });
        $(function() {
            $('.dates #father_deth').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'multidate': true
            });

        });
    </script>
@endsection
