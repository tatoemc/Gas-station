@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    تعديل كفالة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الكفالات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل كفالة</span>
            </div>
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

    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">تعديل كفالة</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">

                                        <div class="tab">
                                            <div class="table-responsive mt-15">
                                                {!! Form::model($sponserform, ['route' => ['sponserforms.update', $sponserform->id], 'method' => 'PUT', 'files' => 'ture']) !!}
                                                <table class="table table-striped" style="text-align:right">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">المبلغ</th>
                                                            <th scope="row">نوع الكفالة</th>
                                                            <th scope="row">طريقة الدفع</th>
                                                            <th scope="row">الكافل</th>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <input type="hidden" name="id" id="sponsor_id"
                                                                    value="{{ $sponserform->id }}">
                                                                <input type="text" name="amount"
                                                                    value="{{ $sponserform->amount }}">
                                                            </td>


                                                            <td>
                                                                <select class="form-control" name="kafal_type">
                                                                    <option value='شهرية'
                                                                        {{ $sponserform->kafal_type == 'شهرية' ? 'selected' : '' }}>
                                                                        شهرية </option>
                                                                    <option value='سنوية'
                                                                        {{ $sponserform->kafal_type == 'سنوية' ? 'selected' : '' }}>
                                                                        سنوية </option>
                                                                </select>
                                                            </td>

                                                            <td>
                                                                <select class="form-control" name="payment_type">
                                                                    <option value='كاش'
                                                                        {{ $sponserform->payment_type == 'كاش' ? 'selected' : '' }}>
                                                                        كاش </option>
                                                                    <option value='تحويل بنكي'
                                                                        {{ $sponserform->payment_type == 'تحويل بنكي' ? 'selected' : '' }}>
                                                                        تحويل بنكي </option>
                                                                </select>
                                                            </td>

                                                            <td>
                                                              <select class="form-control" name="semester_id">
			                                                   @foreach($semesters as $semester)
                                                               <option value='{{ $semester->id}}'{{$semester->id == $subject->semester_id ? 'selected' : '' }}> {{ $semester->name}}</option>
        	                                                   @endforeach
                                                              </select>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td colspan="3">
                                                                <label for="images" class="control-label">المرفق</label>
                                                                <input type="file" name="images" class="dropify"
                                                                    accept=".jpg, .png, image/jpeg, image/png"
                                                                    data-height="70" />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td> {{ Form::submit('حفظ', ['class' => 'btn btn-success btn-block']) }}
                                                            </td>
                                                            <td> {{ Html::linkRoute('sponserforms.show', 'الغاء', [$sponserform->id], ['class' => 'btn btn-danger btn-block']) }}
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->


@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>


@endsection
