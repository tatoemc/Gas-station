@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل الناقلة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الناقلات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل  الناقلة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
           <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tankers.index') }}">رجوع</a>
                            
                        </div>
                    </div><br>
                    <div  class="table-responsive " id="print">
                        <table class="table mg-b-0 text-md-nowrap" >
                            <thead>
                            
                             <tr>
                               <th colspan="2"> <h3>بيانات الناقلة رقم : {{ $tanker->id }}</h3> </th>
                             </tr>
                            </thead>
                            <tbody >
                                <tr>
                                    <td>اسم السائق</td>
                                    <td>{{ $tanker->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>رقم الهاتف</td>
                                    <td>{{ $tanker->user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>رقم الناقلة</td>
                                    <td>{{ $tanker->car_number  }}</td>
                                </tr>
                              
                                <tr>
                                    <td>سعة الناقلة</td>
                                    <td>{{ $tanker->capacity }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
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

@endsection
